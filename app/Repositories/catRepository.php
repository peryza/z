<?php

namespace App\Repositories;

use App\Models\Cat;
use App\Repositories\BaseRepository;

/**
 * Class CatRepository
 * @package App\Repositories
 * @version October 3, 2019, 6:33 am UTC
*/

class CatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'species'
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
        return Cat::class;
    }
}
