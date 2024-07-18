<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = "surat_masuk";
    protected $primaryKey = "id";
    protected $fillable = [
        "tanggal", "no_surat", "asal_surat", "perihal", "disp1", "disp2", "id_kop", "id_tandatangan", "image"
    ];

    public function kepalaSurat()
    {
        return $this->belongsTo(KepalaSurat::class, 'id_kop');
    }

    public function namaTandatgn()
    {
        return $this->belongsTo(NamaTandatgn::class, 'id_tandatangan');
    }
}
