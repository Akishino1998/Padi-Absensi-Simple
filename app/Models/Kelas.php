<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Kelas
 * @package App\Models
 * @version October 21, 2025, 5:10 am UTC
 *
 * @property string $nama_kelas
 * @property integer $tingkat
 */
class Kelas extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kelas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_kelas',
        'tingkat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_kelas' => 'string',
        'tingkat' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_kelas' => 'nullable|string|max:50',
        'tingkat' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
 
    public function Guru()
    {
        return $this->hasMany(KelasGuru::class, 'id_kelas', 'id');
    }
    public function Siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id');
    }
    
}
