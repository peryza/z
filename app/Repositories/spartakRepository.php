<?php

namespace App\Repositories;

use App\Models\spartak;
use App\Repositories\BaseRepository;

/**
 * Class spartakRepository
 * @package App\Repositories
 * @version September 23, 2019, 5:27 am UTC
*/

class spartakRepository extends BaseRepository
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
        return spartak::class;
    }
}
