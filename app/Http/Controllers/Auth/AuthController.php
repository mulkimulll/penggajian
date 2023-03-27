<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function login_check(request $request)
    {
        $user = DB::select("SELECT * FROM users where email = ?",[$request->email]);
        $ingat = $request->remember ? true:false;
        if (empty($user)) {
            return redirect()->back()->with('error', 'Email Tidak Ditemukan');
        } else {
            if (Hash::check($request->password, $user[0]->password)) {
                if (!Auth::attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ], $ingat)) {
                    return redirect()->back()->with('error', 'Silahkan Isi Dengan Benar');
                }
                
                return redirect()->route('dashboard')->with(['success' => 'Login Berhasil']);
            } else {
                return redirect()->back()->with('error', 'Password anda salah.!');
            }
        }
    }

    public function login()
    {

        return view('auth.login');
    }

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        Auth::logout();
        return redirect()->route('login')->with(['success' => 'Logout Berhasil']);
    }
}
