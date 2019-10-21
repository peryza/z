<?php

namespace App\Repositories;

use App\Models\orenburg;
use App\Repositories\BaseRepository;

/**
 * Class orenburgRepository
 * @package App\Repositories
 * @version September 26, 2019, 5:14 am UTC
*/

class orenburgRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return orenburg::class;
    }
}
