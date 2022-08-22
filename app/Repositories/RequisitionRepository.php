<?php

namespace App\Repositories;

use App\Models\Requisition;
use App\Repositories\BaseRepository;

/**
 * Class RequisitionRepository
 * @package App\Repositories
 * @version August 21, 2022, 1:11 pm UTC
*/

class RequisitionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ctrl_no',
        'truck_id',
        'status'
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
        return Requisition::class;
    }
}
