<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Mahasiswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // UNTUK NAMA TABLE
    protected $table = 'u-mahasiswa';
    // JIKA PRIMARY KEY BUKAN ID MAKA HARUS DIGANTI DI SINI!!
    protected $primarykey = 'id';
    // UNTUK MENAMPILKAN COLOM MANA SAJA YANG INGIN DI AMBIL
    protected $fillable = ['id', 'email', 'password', 'nama', 'tanggal_lahir', 'alamat', 'nomer_telepon', 'jenis_kelamin', 'foto', 'catatan', 'kode_jurusan'];

    function getJurusan()
    {
        return $this->BelongsTo('App\Models\Jurusan', 'kode_jurusan');
    }

    public function getJenisKelamin($jenis)
    {
        if ($jenis == 'P') return 'Perempuan';
        else if ($jenis == 'L') return 'Laki-Laki';
        else return 'Tidak Masuk';
    }
}
