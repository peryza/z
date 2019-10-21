<?php

namespace App\Repositories;

use App\Models\Rostov;
use App\Repositories\BaseRepository;

/**
 * Class RostovRepository
 * @package App\Repositories
 * @version September 23, 2019, 5:31 am UTC
*/

class RostovRepository extends BaseRepository
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
        return Rostov::class;
    }
}
