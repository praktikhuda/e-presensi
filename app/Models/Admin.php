<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // UNTUK NAMA TABLE
    protected $table = 'u-admin';
    // JIKA PRIMARY KEY BUKAN ID MAKA HARUS DIGANTI DI SINI!!
    protected $primarykey = 'id';
    // UNTUK MENAMPILKAN COLOM MANA SAJA YANG INGIN DI AMBIL
    protected $fillable = ['id', 'username', 'email', 'password', 'role', 'nama'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
