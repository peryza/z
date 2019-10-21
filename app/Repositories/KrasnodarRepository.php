<?php

namespace App\Repositories;

use App\Models\Krasnodar;
use App\Repositories\BaseRepository;

/**
 * Class KrasnodarRepository
 * @package App\Repositories
 * @version September 23, 2019, 5:29 am UTC
*/

class KrasnodarRepository extends BaseRepository
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
        return Krasnodar::class;
    }
}
