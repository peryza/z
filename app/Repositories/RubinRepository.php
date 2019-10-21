<?php

namespace App\Repositories;

use App\Models\Rubin;
use App\Repositories\BaseRepository;

/**
 * Class RubinRepository
 * @package App\Repositories
 * @version September 29, 2019, 11:50 am UTC
*/

class RubinRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'age'
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
        return Rubin::class;
    }
}
