<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;
    public $table = 'pelajaran';
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    public function Absensi()
    {
        return $this->hasMany(PelajaranKehadiran::class, 'id_pelajaran', 'id');
    }
    public function Guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }
    
}
