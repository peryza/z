<?php

namespace App\Repositories;

use App\Models\Cska2;
use App\Repositories\BaseRepository;

/**
 * Class Cska2Repository
 * @package App\Repositories
 * @version September 30, 2019, 4:38 am UTC
*/

class Cska2Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'Age'
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
        return Cska2::class;
    }
}
