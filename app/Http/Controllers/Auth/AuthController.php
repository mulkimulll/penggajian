<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AuthController extends Controller
{
    public function login_check(request $request)
    {
        if ($request->isMethod('POST')) {
            $user = DB::select("SELECT * FROM users where email = ?",[$request->email])[0];
            $ingat = $request->remember ? true:false;
            if (empty($user)) {
                return redirect()->back()->with('error', 'Email Tidak Ditemukan');
            } else {
                if (Hash::check($request->password, $user->password)) {
                    if (!Auth::attempt([
                        'email' => $request->email,
                        'password' => $request->password
                    ], $ingat)) {
                        return redirect()->back()->with('error', 'Silahkan Isi Dengan Benar');
                    }
                } else {
                    return redirect()->back()->with('error', 'Password anda salah.!');
                }
            }
        }

        return view('auth.login');
    }
}
