<?php

namespace App\Repositories;

use App\Models\cska;
use App\Repositories\BaseRepository;

/**
 * Class cskaRepository
 * @package App\Repositories
 * @version September 23, 2019, 3:26 am UTC
*/

class cskaRepository extends BaseRepository
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
        return cska::class;
    }
}
