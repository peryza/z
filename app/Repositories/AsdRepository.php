<?php

namespace App\Repositories;

use App\Models\Asd;
use App\Repositories\BaseRepository;

/**
 * Class AsdRepository
 * @package App\Repositories
 * @version September 26, 2019, 5:06 am UTC
*/

class AsdRepository extends BaseRepository
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
        return Asd::class;
    }
}
