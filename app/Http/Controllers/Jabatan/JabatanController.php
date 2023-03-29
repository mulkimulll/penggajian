<?php

namespace App\Http\Controllers\Jabatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jabatan;

class JabatanController extends Controller
{
    public function index(request $request)
    {
        $data = Jabatan::all();

        if ($request->isMethod('POST')) {
            $ins = new Jabatan;
            $ins->nama = $request->nama;
            $ins->save();

            return redirect()->back()->with('success', 'Berhasil Simpan Data');
        }

        return view('Jabatan.index',compact('data'));
    }
}
