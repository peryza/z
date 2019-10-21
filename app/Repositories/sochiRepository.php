<?php

namespace App\Repositories;

use App\Models\sochi;
use App\Repositories\BaseRepository;

/**
 * Class sochiRepository
 * @package App\Repositories
 * @version September 23, 2019, 5:21 am UTC
*/

class sochiRepository extends BaseRepository
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
        return sochi::class;
    }
}
