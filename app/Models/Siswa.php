<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Siswa
 * @package App\Models
 * @version October 21, 2025, 4:18 am UTC
 *
 * @property string $nis
 * @property string $nisn
 * @property string $nama_siswa
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $agama
 * @property string $alamat
 * @property string $no_hp
 * @property string $email
 * @property string $nama_ayah
 * @property string $nama_ibu
 * @property string $nama_wali
 * @property string $pekerjaan_ortu
 * @property string $no_hp_ortu
 * @property integer $id_kelas_aktif
 * @property string $tahun_masuk
 * @property string $status_siswa
 */
class Siswa extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'siswa';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nis',
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'no_hp',
        'email',
        'nama_ayah',
        'nama_ibu',
        'nama_wali',
        'pekerjaan_ortu',
        'no_hp_ortu',
        'id_kelas_aktif',
        'tahun_masuk',
        'status_siswa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nis' => 'string',
        'nisn' => 'string',
        'nama_siswa' => 'string',
        'jenis_kelamin' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'date',
        'agama' => 'string',
        'alamat' => 'string',
        'no_hp' => 'string',
        'email' => 'string',
        'nama_ayah' => 'string',
        'nama_ibu' => 'string',
        'nama_wali' => 'string',
        'pekerjaan_ortu' => 'string',
        'no_hp_ortu' => 'string',
        'id_kelas_aktif' => 'integer',
        'tahun_masuk' => 'date',
        'status_siswa' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nis' => 'nullable|string|max:20',
        'nisn' => 'nullable|string|max:20',
        'nama_siswa' => 'required|string|max:100',
        'jenis_kelamin' => 'nullable|string',
        'tempat_lahir' => 'nullable|string|max:50',
        'tanggal_lahir' => 'nullable',
        'agama' => 'nullable|string|max:20',
        'alamat' => 'nullable|string',
        'no_hp' => 'nullable|string|max:15',
        'email' => 'nullable|string|max:100',
        'nama_ayah' => 'nullable|string|max:100',
        'nama_ibu' => 'nullable|string|max:100',
        'nama_wali' => 'nullable|string|max:100',
        'pekerjaan_ortu' => 'nullable|string|max:100',
        'no_hp_ortu' => 'nullable|string|max:15',
        'id_kelas_aktif' => 'nullable|integer',
        'tahun_masuk' => 'nullable',
        'status_siswa' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
    
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    function checkAbsensi($idSiswa, $idPelajaran){
        $kehadiran = PelajaranKehadiran::where('id_siswa',$idSiswa)->where('id_pelajaran',$idPelajaran)->get();
        return $kehadiran;
    }
    
}
