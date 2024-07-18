<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaTandatgn extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "nama_tandatgn";
    protected $primaryKey = "id_tandatangan";
    protected $fillable = [
        "nama_tandatgn", "jabatan", "nip"
    ];

    public function suratMasuk()
    {
        return $this->hasMany(SuratMasuk::class, 'id_tandatangan');
    }

    public function suratKeluar()
    {
        return $this->hasMany(SuratKeluar::class, 'id_tandatangan');
    }
}
