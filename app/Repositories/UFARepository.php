<?php

namespace App\Repositories;

use App\Models\UFA;
use App\Repositories\BaseRepository;

/**
 * Class UFARepository
 * @package App\Repositories
 * @version September 26, 2019, 5:16 am UTC
*/

class UFARepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'Age'
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
        return UFA::class;
    }
}
