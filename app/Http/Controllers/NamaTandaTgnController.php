<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NamaTandatgn;

class NamaTandatgnController extends Controller
{
    public function viewNamaTandatgn()
    {
        $namaTandatgns = NamaTandatgn::all();
        return view('namaTandatgn.index', compact('namaTandatgns'));
    }

    public function inputNamaTandatgn()
    {
        return view('namaTandatgn.create');
    }

    public function saveNamaTandatgn(Request $request)
    {
        $request->validate([
            'nama_tandatgn' => 'required|max:100',
            'jabatan' => 'required|max:200',
            'nip' => 'required|max:25',
        ]);

        NamaTandatgn::create([
            'nama_tandatgn' => $request->nama_tandatgn,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
        ]);

        return redirect('/view-nama-tandatgn')->with('success', 'Nama Tanda Tangan berhasil ditambahkan.');
    }

    public function editNamaTandatgn($id)
    {
        $namaTandatgn = NamaTandatgn::findOrFail($id);
        return view('namaTandatgn.edit', compact('namaTandatgn'));
    }

    public function updateNamaTandatgn(Request $request, $id)
    {
        $request->validate([
            'nama_tandatgn' => 'required|max:100',
            'jabatan' => 'required|max:200',
            'nip' => 'required|max:25',
        ]);

        $namaTandatgn = NamaTandatgn::findOrFail($id);
        $namaTandatgn->update([
            'nama_tandatgn' => $request->nama_tandatgn,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
        ]);

        return redirect('/view-nama-tandatgn')->with('success', 'Nama Tanda Tangan berhasil diperbarui.');
    }

    public function hapusNamaTandatgn($id)
    {
        $namaTandatgn = NamaTandatgn::findOrFail($id);
        $namaTandatgn->delete();

        return redirect('/view-nama-tandatgn')->with('success', 'Nama Tanda Tangan berhasil dihapus.');
    }
}
