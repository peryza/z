<?php

namespace App\Repositories;

use App\Models\car;
use App\Repositories\BaseRepository;

/**
 * Class carRepository
 * @package App\Repositories
 * @version September 19, 2019, 5:46 am UTC
*/

class carRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Model'
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
        return car::class;
    }
}
