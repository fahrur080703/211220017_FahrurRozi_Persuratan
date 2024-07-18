<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Support\Facades\File;

class SuratController extends Controller
{
    public function Main()
    {
        return view("layouts.main");
    }

    public function index()
    {
        $data2 = User::count();
        $keluar = SuratKeluar::count();
        $suratMasuk = SuratMasuk::count();
        $data = [$data2, $keluar, $suratMasuk];
        return view("index",['data'=>$data] );
    }

}
