<?php

namespace App\Repositories;

use App\Models\Model;
use App\Repositories\BaseRepository;

/**
 * Class ModelRepository
 * @package App\Repositories
 * @version October 3, 2019, 6:41 am UTC
*/

class ModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name'
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
        return Model::class;
    }
}
