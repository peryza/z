<?php

namespace App\Repositories;

use App\Models\ahmat;
use App\Repositories\BaseRepository;

/**
 * Class ahmatRepository
 * @package App\Repositories
 * @version September 26, 2019, 5:09 am UTC
*/

class ahmatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'Age',
        'Work_Foot'
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
        return ahmat::class;
    }
}
