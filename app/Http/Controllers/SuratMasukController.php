<?php

namespace App\Http\Controllers;

use App\Models\KepalaSurat;
use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\NamaTandatgn;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function viewSm()
    {
        $dataSm = SuratMasuk::all();
        return view("surat-m.view-sm", ['data' => $dataSm]);
    }

    public function inputSm()
    {
        $dataKepala = KepalaSurat::all();
        $dataTandatangan = NamaTandatgn::all();
        return view("surat-m.input-sm", ['kepala' => $dataKepala, 'tandatangan' => $dataTandatangan]);
    }

    public function saveSm(Request $x)
    {
        $messages = [
            'no_surat.required' => 'Nomor surat tidak boleh kosong!',
            'tanggal.required' => 'Tanggal surat tidak boleh kosong!',
            'asal_surat.required' => 'Asal surat tidak boleh kosong!',
            'id_kop.required' => 'Kepala surat tidak boleh kosong!',
            'perihal.required' => 'Perihal tidak boleh kosong!',
            'disp1.required' => 'Disposisi 1 tidak boleh kosong!',
            'disp2.required' => 'Disposisi 2 tidak boleh kosong!',
            'id_tandatangan.required' => 'Tanda tangan tidak boleh kosong!',
            'image.required' => 'File surat tidak boleh kosong!',
            'image.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];

        $cekValidasi = $x->validate([
            'no_surat' => 'required',
            'tanggal' => 'required',
            'asal_surat' => 'required',
            'id_kop' => 'required',
            'perihal' => 'required',
            'disp1' => 'required',
            'disp2' => 'required',
            'id_tandatangan' => 'required',
            'image' => 'required|mimes:pdf|max:2048'
        ], $messages);

        $file = $x->file('image');
        if (empty($file)) {
            SuratMasuk::create([
                'no_surat' => $x->no_surat,
                'tanggal' => $x->tanggal,
                'asal_surat' => $x->asal_surat,
                'id_kop' => $x->id_kop,
                'perihal' => $x->perihal,
                'disp1' => $x->disp1,
                'disp2' => $x->disp2,
                'id_tandatangan' => $x->id_tandatangan,
            ]);
        } else {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $file->move('file', $nama_file);
            $pathPublic = 'file/' . $nama_file;
            SuratMasuk::create([
                'no_surat' => $x->no_surat,
                'tanggal' => $x->tanggal,
                'asal_surat' => $x->asal_surat,
                'id_kop' => $x->id_kop,
                'perihal' => $x->perihal,
                'disp1' => $x->disp1,
                'disp2' => $x->disp2,
                'id_tandatangan' => $x->id_tandatangan,
                'image' => $pathPublic,
            ]);
        }

        return redirect('/view-sm')->with('toast_success', 'Data berhasil tambah!');
    }

    public function editSm($idSmasuk)
    {
        $dataKepala = KepalaSurat::all();
        $dataTandatangan = NamaTandatgn::all();
        $dataSm = SuratMasuk::find($idSmasuk);
        return view("surat-m.edit-sm", ['data' => $dataSm, 'kepala' => $dataKepala, 'tandatangan' => $dataTandatangan]);
    }

    public function updateSm($idSmasuk, Request $x)
    {
        $messages = [
            'no_surat.required' => 'Nomor surat tidak boleh kosong!',
            'tanggal.required' => 'Tanggal surat tidak boleh kosong!',
            'asal_surat.required' => 'Asal surat tidak boleh kosong!',
            'id_kop.required' => 'Kepala surat tidak boleh kosong!',
            'perihal.required' => 'Perihal tidak boleh kosong!',
            'disp1.required' => 'Disposisi 1 tidak boleh kosong!',
            'disp2.required' => 'Disposisi 2 tidak boleh kosong!',
            'id_tandatangan.required' => 'Tanda tangan tidak boleh kosong!',
            'image.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];
        $cekValidasi = $x->validate([
            'no_surat' => 'required',
            'tanggal' => 'required',
            'asal_surat' => 'required',
            'id_kop' => 'required',
            'perihal' => 'required',
            'disp1' => 'required',
            'disp2' => 'required',
            'id_tandatangan' => 'required',
            'image' => 'mimes:pdf|max:2048'
        ], $messages);

        $file = $x->file('image');
        if (!empty($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $file->move('file', $nama_file);
            $path = 'file/' . $nama_file;
            $data = SuratMasuk::where('id', $idSmasuk)->first();
            File::delete($data->image);
        } else {
            $path = $x->pathFile;
        }

        SuratMasuk::where("id", "$idSmasuk")->update([
            'no_surat' => $x->no_surat,
            'tanggal' => $x->tanggal,
            'asal_surat' => $x->asal_surat,
            'id_kop' => $x->id_kop,
            'perihal' => $x->perihal,
            'disp1' => $x->disp1,
            'disp2' => $x->disp2,
            'id_tandatangan' => $x->id_tandatangan,
            'image' => $path,
        ], $cekValidasi);

        return redirect('/view-sm')->with('toast_success', 'Data berhasil di update!');
    }

    public function hapusSm($idSmasuk)
    {
        try {
            $data = SuratMasuk::where('id', $idSmasuk)->first();
            File::delete($data->image);
            SuratMasuk::where('id', $idSmasuk)->delete();
            return redirect('/view-sm')->with('toast_success', 'Data berhasil di hapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/view-sm')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }

    public function unduh($idSmasuk)
    {
        $data = SuratMasuk::where('id', $idSmasuk)->first();
        $pathToFile = public_path($data->image);
        return response()->download($pathToFile);
    }

    public function detailSm($idSmasuk)
    {
        $dataSm = SuratMasuk::find($idSmasuk);
        return view("surat-m.detail-sm", ['data' => $dataSm]);
    }
}
