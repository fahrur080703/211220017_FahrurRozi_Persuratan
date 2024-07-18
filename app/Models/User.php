<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;
    protected $table = "user";
    protected $primaryKey = "id_user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'status', 'nama_ptgs',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function kepalaSurat()
    {
        return $this->hasMany(KepalaSurat::class, 'id_user');
    }

    public function suratKeluar()
    {
        return $this->hasMany(SuratKeluar::class, 'id_user');
    }
}
