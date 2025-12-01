<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasGuru extends Model
{
    use HasFactory;
    public $table = 'kelas_guru';
    protected $dates = ['deleted_at'];
   
    public function Guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

}
