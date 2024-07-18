<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "surat_keluar";
    protected $primaryKey = "id";
    protected $fillable = [
        "tanggal", "no_surat", "perihal", "tujuan", "isi_surat", "id_tandatangan", "id_user"
    ];

    public function namaTandatgn()
    {
        return $this->belongsTo(NamaTandatgn::class, 'id_tandatangan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
