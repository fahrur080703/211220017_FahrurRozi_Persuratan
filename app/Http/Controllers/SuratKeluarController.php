<?php

namespace App\Http\Controllers;

use App\Models\KepalaSurat;
use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use App\Models\NamaTandatgn;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function viewSk()
    {
        $dataSk = SuratKeluar::all();
        return view("surat-k.view-sk", ['data' => $dataSk]);
    }

    public function inputSk()
    {
        $dataKepala = KepalaSurat::all();
        $dataTandatangan = NamaTandatgn::all();
        return view("surat-k.input-sk", ['kepala' => $dataKepala, 'tandatangan' => $dataTandatangan]);
    }

    public function saveSk(Request $x)
    {
        $messages = [
            'tanggal.required' => 'Tanggal surat tidak boleh kosong!',
            'no_surat.required' => 'Nomor surat tidak boleh kosong!',
            'perihal.required' => 'Perihal tidak boleh kosong!',
            'tujuan.required' => 'Tujuan tidak boleh kosong!',
            'isi_surat.required' => 'Isi surat tidak boleh kosong!',
            'id_kop.required' => 'Kepala surat tidak boleh kosong!',
            'id_tandatangan.required' => 'Tanda tangan tidak boleh kosong!',
            'id_user.required' => 'ID user tidak boleh kosong!',
            'file.required' => 'File surat tidak boleh kosong!',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];
        $cekValidasi = $x->validate([
            'tanggal' => 'required',
            'no_surat' => 'required',
            'perihal' => 'required',
            'tujuan' => 'required',
            'isi_surat' => 'required',
            'id_kop' => 'required',
            'id_tandatangan' => 'required',
            'id_user' => 'required',
            'file' => 'required|mimes:pdf|max:2048'
        ], $messages);

        $file = $x->file('file');
        if (empty($file)) {
            SuratKeluar::create([
                'tanggal' => $x->tanggal,
                'no_surat' => $x->no_surat,
                'perihal' => $x->perihal,
                'tujuan' => $x->tujuan,
                'isi_surat' => $x->isi_surat,
                'id_kop' => $x->id_kop,
                'id_tandatangan' => $x->id_tandatangan,
                'id_user' => $x->id_user,
            ], $cekValidasi);
        } else {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $patAsli = $file->getRealPath();
            $namaFolder = 'file';
            $file->move($namaFolder, $nama_file);
            $pathPublic = $namaFolder . "/" . $nama_file;
            SuratKeluar::create([
                'tanggal' => $x->tanggal,
                'no_surat' => $x->no_surat,
                'perihal' => $x->perihal,
                'tujuan' => $x->tujuan,
                'isi_surat' => $x->isi_surat,
                'id_kop' => $x->id_kop,
                'id_tandatangan' => $x->id_tandatangan,
                'id_user' => $x->id_user,
                'file' => $pathPublic,
            ], $cekValidasi);
        }

        return redirect('/view-sk')->with('toast_success', 'Data berhasil tambah!');
    }

    public function editSk($idSkeluar)
    {
        $dataKepala = KepalaSurat::all();
        $dataTandatangan = NamaTandatgn::all();
        $dataSk = SuratKeluar::find($idSkeluar);
        return view("surat-k.edit-sk", ['data' => $dataSk, 'kepala' => $dataKepala, 'tandatangan' => $dataTandatangan]);
    }

    public function updateSk($idSkeluar, Request $x)
    {
        $messages = [
            'tanggal.required' => 'Tanggal surat tidak boleh kosong!',
            'no_surat.required' => 'Nomor surat tidak boleh kosong!',
            'perihal.required' => 'Perihal tidak boleh kosong!',
            'tujuan.required' => 'Tujuan tidak boleh kosong!',
            'isi_surat.required' => 'Isi surat tidak boleh kosong!',
            'id_kop.required' => 'Kepala surat tidak boleh kosong!',
            'id_tandatangan.required' => 'Tanda tangan tidak boleh kosong!',
            'id_user.required' => 'ID user tidak boleh kosong!',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];
        $cekValidasi = $x->validate([
            'tanggal' => 'required',
            'no_surat' => 'required',
            'perihal' => 'required',
            'tujuan' => 'required',
            'isi_surat' => 'required',
            'id_kop' => 'required',
            'id_tandatangan' => 'required',
            'id_user' => 'required',
            'file' => 'mimes:pdf|max:2048'
        ], $messages);

        $file = $x->file('file');
        if (!empty($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'file';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            $data = SuratKeluar::where('id', $idSkeluar)->first();
            File::delete($data->file);
        } else {
            $path = $x->pathFile;
        }

        SuratKeluar::where("id", "$idSkeluar")->update([
            'tanggal' => $x->tanggal,
            'no_surat' => $x->no_surat,
            'perihal' => $x->perihal,
            'tujuan' => $x->tujuan,
            'isi_surat' => $x->isi_surat,
            'id_kop' => $x->id_kop,
            'id_tandatangan' => $x->id_tandatangan,
            'id_user' => $x->id_user,
            'file' => $path,
        ], $cekValidasi);

        return redirect('/view-sk')->with('toast_success', 'Data berhasil di update!');
    }

    public function hapusSk($idSkeluar)
    {
        try {
            $data = SuratKeluar::where('id', $idSkeluar)->first();
            File::delete($data->file);
            SuratKeluar::where('id', $idSkeluar)->delete();
            return redirect('/view-sk')->with('toast_success', 'Data berhasil di hapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/view-sk')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }

    public function unduh($idSkeluar)
    {
        $data = SuratKeluar::where('id', $idSkeluar)->first();
        $pathToFile = public_path($data->file);
        return response()->download($pathToFile);
    }

    public function detailSk($idSkeluar)
    {
        $dataSk = SuratKeluar::find($idSkeluar);
        return view("surat-k.detail-sk", ['data' => $dataSk]);
    }
}
