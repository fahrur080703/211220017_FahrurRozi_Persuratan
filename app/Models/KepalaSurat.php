<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaSurat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "kepala_surat";
    protected $primaryKey = "id_kop";
    protected $fillable = ["nama_kop", "alamat_kop", "nama_tujuan", "id_user"];

    public function suratMasuk(){
        return $this->hasMany(SuratMasuk::class, 'id_kop');
    }

    public function suratKeluar(){
        return $this->hasMany(SuratKeluar::class, 'id_kop');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
