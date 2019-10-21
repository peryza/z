<?php

namespace App\Repositories;

use App\Models\Dinamo2;
use App\Repositories\BaseRepository;

/**
 * Class Dinamo2Repository
 * @package App\Repositories
 * @version September 29, 2019, 11:59 am UTC
*/

class Dinamo2Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Dinamo2::class;
    }
}
