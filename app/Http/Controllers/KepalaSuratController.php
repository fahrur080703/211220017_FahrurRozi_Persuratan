<?php

namespace App\Http\Controllers;

use App\Models\KepalaSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KepalaSuratController extends Controller
{
    public function viewKs() {
        $dataKepala = KepalaSurat::all();
        return view("kepala-surat.view-ks", ['data' => $dataKepala]);
    }

    public function inputKs() {
        $user = Auth::user();
        $userId = $user->id;
        return view("kepala-surat.input-ks", ['userId' => $userId]);
    }

    public function saveKs(Request $request) {
        $messages = [
            'nama_kop.required' => 'Nama Kop tidak boleh kosong!',
            'alamat_kop.required' => 'Alamat Kop tidak boleh kosong!',
            'nama_tujuan.required' => 'Nama Tujuan tidak boleh kosong!',
            'id_user.required' => 'ID User tidak boleh kosong!',
        ];

        $validated = $request->validate([
            'nama_kop' => 'required',
            'alamat_kop' => 'required',
            'nama_tujuan' => 'required',
            'id_user' => 'required',
        ], $messages);

        KepalaSurat::create($validated);

        return redirect('/view-ks')->with('toast_success', 'Data berhasil ditambah!');
    }

    public function editKs($idKepala) {
        $user = Auth::user();
        $userId = $user->id;
        $dataKepala = KepalaSurat::findOrFail($idKepala);
        return view("kepala-surat.edit-ks", ['data' => $dataKepala, 'userId' => $userId]);
    }

    public function updateKs($idKepala, Request $request) {
        $messages = [
            'nama_kop.required' => 'Nama Kop tidak boleh kosong!',
            'alamat_kop.required' => 'Alamat Kop tidak boleh kosong!',
            'nama_tujuan.required' => 'Nama Tujuan tidak boleh kosong!',
            'id_user.required' => 'ID User tidak boleh kosong!',
        ];

        $validated = $request->validate([
            'nama_kop' => 'required',
            'alamat_kop' => 'required',
            'nama_tujuan' => 'required',
            'id_user' => 'required',
        ], $messages);

        KepalaSurat::where("id_kop", $idKepala)->update($validated);

        return redirect('/view-ks')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function hapusKs($id) {
        try {
            KepalaSurat::where('id_kop', $id)->delete();
            return redirect('/view-ks')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/view-ks')->with('toast_error', 'Data tidak bisa dihapus!');
        }
    }
}
