<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Mapel
 * @package App\Models
 * @version October 21, 2025, 4:19 am UTC
 *
 * @property string $kode_mapel
 * @property string $nama_mapel
 * @property string $deskripsi
 */
class Mapel extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'mapel';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_mapel',
        'nama_mapel',
        'deskripsi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_mapel' => 'string',
        'nama_mapel' => 'string',
        'deskripsi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_mapel' => 'nullable|string|max:50',
        'nama_mapel' => 'nullable|string|max:50',
        'deskripsi' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
