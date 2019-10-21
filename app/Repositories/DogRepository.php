<?php

namespace App\Repositories;

use App\Models\Dog;
use App\Repositories\BaseRepository;

/**
 * Class DogRepository
 * @package App\Repositories
 * @version September 30, 2019, 4:59 am UTC
*/

class DogRepository extends BaseRepository
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
        return Dog::class;
    }
}
