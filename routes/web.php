<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NamaTandatgnController;
use App\Http\Controllers\KepalaSuratController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'viewLogin'])->name('login');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/view-login', [LoginController::class, 'viewLogin'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/main', [SuratController::class, 'main']);
    Route::get('/surat', [SuratController::class, 'index']);
    Route::get('/view-ks', [KepalaSuratController::class, 'viewKs']);
    Route::get('/view-nama-tandatgn', [NamaTandatgnController::class, 'viewNamaTandatgn']);
    Route::get('/view-sm', [SuratMasukController::class, 'viewSm']);
    Route::get('/view-sk', [SuratKeluarController::class, 'viewSk']);

    Route::get('/input-ks', [KepalaSuratController::class, 'inputKs']);
    Route::post('/save-ks', [KepalaSuratController::class, 'saveKs']);
    Route::get('/edit-ks/{id_kop}', [KepalaSuratController::class, 'editKs']);
    Route::post('/update-ks/{id_kop}', [KepalaSuratController::class, 'updateKs']);
    Route::get('/hapus-ks/{id_kop}', [KepalaSuratController::class, 'hapusKs']);

    Route::get('/input-sm', [SuratMasukController::class, 'inputSm']);
    Route::post('/save-sm', [SuratMasukController::class, 'saveSm']);
    Route::get('/edit-sm/{id}', [SuratMasukController::class, 'editSm']);
    Route::post('/update-sm/{id}', [SuratMasukController::class, 'updateSm']);
    Route::get('/hapus-sm/{id}', [SuratMasukController::class, 'hapusSm']);

    Route::get('/input-sk', [SuratKeluarController::class, 'inputSk']);
    Route::post('/save-sk', [SuratKeluarController::class, 'saveSk']);
    Route::get('/edit-sk/{id}', [SuratKeluarController::class, 'editSk']);
    Route::post('/update-sk/{id}', [SuratKeluarController::class, 'updateSk']);
    Route::get('/hapus-sk/{id}', [SuratKeluarController::class, 'hapusSk']);


    Route::get('/input-nama-tandatgn', [NamaTandatgnController::class, 'inputNamaTandatgn']);
    Route::post('/save-nama-tandatgn', [NamaTandatgnController::class, 'saveNamaTandatgn']);
    Route::get('/edit-nama-tandatgn/{id_tandatangan}', [NamaTandatgnController::class, 'editNamaTandatgn']);
    Route::post('/update-nama-tandatgn/{id_tandatangan}', [NamaTandatgnController::class, 'updateNamaTandatgn']);
    Route::get('/hapus-nama-tandatgn/{id_tandatangan}', [NamaTandatgnController::class, 'hapusNamaTandatgn']);

    Route::get('/view-user', [LoginController::class, 'viewUser']);
    Route::get('/input-user', [LoginController::class, 'inputUser']);
    Route::post('/save-user', [LoginController::class, 'saveUser']);
    Route::get('/edit-user/{id}', [LoginController::class, 'editUser']);
    Route::get('/hapus-user/{id}', [LoginController::class, 'hapusUser']);
    Route::post('/update-user/{id}', [LoginController::class, 'updateUser']);
});
