<?php

namespace App\Repositories;

use App\Models\torpedo;
use App\Repositories\BaseRepository;

/**
 * Class torpedoRepository
 * @package App\Repositories
 * @version September 26, 2019, 6:31 am UTC
*/

class torpedoRepository extends BaseRepository
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
        return torpedo::class;
    }
}
