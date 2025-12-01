<?php

namespace App\Repositories;

use App\Models\Mapel;
use App\Repositories\BaseRepository;

/**
 * Class MapelRepository
 * @package App\Repositories
 * @version October 21, 2025, 4:19 am UTC
*/

class MapelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_mapel',
        'nama_mapel',
        'deskripsi'
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
        return Mapel::class;
    }
}
