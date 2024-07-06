<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'e-presensi';
    protected $primarykey = 'id';
    protected $fillable = ['matakuliah_id', 'mahasiswa_id', 'tanggal_presensi', 'status', 'catatan'];
    public function getMatakuliah()
    {
        return $this->belongsTo('App\Models\Matakuliah', 'matakuliah_id');
    }

    public function getMahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa', 'mahasiswa_id');
    }
}
