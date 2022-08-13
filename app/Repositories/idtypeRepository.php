<?php

namespace App\Repositories;

use App\Models\idtype;
use App\Repositories\BaseRepository;

/**
 * Class idtypeRepository
 * @package App\Repositories
 * @version August 11, 2022, 3:13 pm UTC
*/

class idtypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return idtype::class;
    }
}
