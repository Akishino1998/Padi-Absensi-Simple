<?php

namespace App\Repositories;

use App\Models\Siswa;
use App\Repositories\BaseRepository;

/**
 * Class SiswaRepository
 * @package App\Repositories
 * @version October 21, 2025, 4:18 am UTC
*/

class SiswaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Siswa::class;
    }
}
