<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Guru
 * @package App\Models
 * @version October 21, 2025, 3:28 am UTC
 *
 * @property string $nip
 * @property string $nama_guru
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property string $no_hp
 * @property string $email
 * @property string $pendidikan_terakhir
 * @property string $tanggal_mulai
 */
class Guru extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'guru';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nip',
        'nama_guru',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'email',
        'pendidikan_terakhir',
        'tanggal_mulai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nip' => 'string',
        'nama_guru' => 'string',
        'jenis_kelamin' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'date',
        'alamat' => 'string',
        'no_hp' => 'string',
        'email' => 'string',
        'pendidikan_terakhir' => 'string',
        'tanggal_mulai' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nip' => 'nullable|string|max:20',
        'nama_guru' => 'required|string|max:100',
        'jenis_kelamin' => 'nullable|string',
        'tempat_lahir' => 'nullable|string|max:50',
        'tanggal_lahir' => 'nullable',
        'alamat' => 'nullable|string',
        'no_hp' => 'nullable|string|max:15',
        'email' => 'nullable|string|max:100',
        'pendidikan_terakhir' => 'nullable|string|max:50',
        'tanggal_mulai' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
 
    public function GuruKelas()
    {
        return $this->hasMany(KelasGuru::class, 'id_guru', 'id');
    }
    
}
