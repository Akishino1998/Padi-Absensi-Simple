<?php

namespace App\Repositories;

use App\Models\Kelas;
use App\Repositories\BaseRepository;

/**
 * Class KelasRepository
 * @package App\Repositories
 * @version October 21, 2025, 5:10 am UTC
*/

class KelasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_kelas',
        'tingkat'
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
        return Kelas::class;
    }
}
