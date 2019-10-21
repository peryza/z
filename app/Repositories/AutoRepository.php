<?php

namespace App\Repositories;

use App\Models\Auto;
use App\Repositories\BaseRepository;

/**
 * Class AutoRepository
 * @package App\Repositories
 * @version October 3, 2019, 6:37 am UTC
*/

class AutoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'model'
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
        return Auto::class;
    }
}
