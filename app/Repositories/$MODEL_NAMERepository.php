<?php

namespace App\Repositories;

use App\Models\$MODEL_NAME;
use App\Repositories\BaseRepository;

/**
 * Class $MODEL_NAMERepository
 * @package App\Repositories
 * @version September 23, 2019, 5:31 am UTC
*/

class $MODEL_NAMERepository extends BaseRepository
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
        return $MODEL_NAME::class;
    }
}
