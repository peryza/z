<?php

namespace App\Repositories;

use App\Models\Tombov;
use App\Repositories\BaseRepository;

/**
 * Class TombovRepository
 * @package App\Repositories
 * @version September 26, 2019, 6:52 am UTC
*/

class TombovRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'age'
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
        return Tombov::class;
    }
}
