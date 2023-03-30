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

    public function get($id)
    {
        $data = Jabatan::where('id', $id)->first();

        return response()->json($data, 200);
    }

    public function editPost(request $request)
    {
        $edit = Jabatan::find($request->id);
        $edit->update([
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('success', 'Berhasil Ubah Data');
    }

    public function destroy($id)
    {
        $del = Jabatan::find($id);
        $del->delete();

        return redirect()->back()->with('success', 'Berhasil Hapus Data');
    }
}
