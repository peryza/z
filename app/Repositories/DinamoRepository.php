<?php

namespace App\Repositories;

use App\Models\Dinamo;
use App\Repositories\BaseRepository;

/**
 * Class DinamoRepository
 * @package App\Repositories
 * @version September 29, 2019, 11:44 am UTC
*/

class DinamoRepository extends BaseRepository
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
        return Dinamo::class;
    }
}
