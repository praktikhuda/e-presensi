<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    // UNTUK NAMA TABLE
    protected $table = 'e-matakuliah';
    // JIKA PRIMARY KEY BUKAN ID MAKA HARUS DIGANTI DI SINI!!
    protected $primarykey = 'id';
    // UNTUK MENAMPILKAN COLOM MANA SAJA YANG INGIN DI AMBIL
    protected $fillable = ['id', 'nama', 'dosen_id', 'jurusan_id', 'foto'];

    public function getDosen()
    {
        return $this->belongsTo('App\Models\Dosen', 'dosen_id');
    }
    public function getJurusan()
    {
        return $this->belongsTo('App\Models\Jurusan', 'jurusan_id');
    }
}
