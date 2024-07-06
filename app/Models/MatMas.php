<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatMas extends Model
{
    use HasFactory;
    protected $table = 'e-matmas';
    protected $primarykey = 'id';
    protected $fillable = ['id', 'matakuliah_id', 'mahasiswa_id'];

    public function getMatakuliah()
    {
        return $this->belongsTo('App\Models\Matakuliah', 'matakuliah_id');
    }

    public function getMahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa', 'mahasiswa_id');
    }
}
