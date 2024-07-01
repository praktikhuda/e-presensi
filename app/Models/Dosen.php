<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Dosen extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // UNTUK NAMA TABLE
    protected $table = 'u-dosen';
    // JIKA PRIMARY KEY BUKAN ID MAKA HARUS DIGANTI DI SINI!!
    protected $primarykey = 'id';
    // UNTUK MENAMPILKAN COLOM MANA SAJA YANG INGIN DI AMBIL
    protected $fillable = ['id', 'email', 'password', 'nama', 'nip', 'jabatan_akademik', 'tanggal_lahir', 'alamat', 'nomer_telepon', 'bidang_keahlian', 'catatan', 'foto'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
