<?php

namespace App\Repositories;

use App\Models\Guru;
use App\Repositories\BaseRepository;

/**
 * Class GuruRepository
 * @package App\Repositories
 * @version October 21, 2025, 3:28 am UTC
*/

class GuruRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Guru::class;
    }
}
