<?php

namespace App\Repositories;

use App\Models\loko;
use App\Repositories\BaseRepository;

/**
 * Class lokoRepository
 * @package App\Repositories
 * @version September 23, 2019, 4:45 am UTC
*/

class lokoRepository extends BaseRepository
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
        return loko::class;
    }
}
