<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelajaranKehadiran extends Model
{
    use HasFactory;
    public $table = 'pelajaran_kehadiran';
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }
    public function Pelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'id_pelajaran', 'id');
    }
    public function DiCekOleh()
    {
        return $this->belongsTo(User::class, 'id_petugas', 'id');
    }
    
}
