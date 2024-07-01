<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = "e-jurusan";
    protected $primarykey = "id";
    protected $fillable = ['id', "kode_jurusan", "nama", "gelar", "akreditasi", "jumlah_mahasiswa", "dosen_id"];
    public function tableDosen()
    {
        return $this->BelongsTo('App\Models\Dosen', 'dosen_id');
    }
}
