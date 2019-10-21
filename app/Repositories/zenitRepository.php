<?php

namespace App\Repositories;

use App\Models\zenit;
use App\Repositories\BaseRepository;

/**
 * Class zenitRepository
 * @package App\Repositories
 * @version September 23, 2019, 3:16 am UTC
*/

class zenitRepository extends BaseRepository
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
        return zenit::class;
    }
}
