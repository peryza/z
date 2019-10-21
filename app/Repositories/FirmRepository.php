<?php

namespace App\Repositories;

use App\Models\Firm;
use App\Repositories\BaseRepository;

/**
 * Class FirmRepository
 * @package App\Repositories
 * @version October 3, 2019, 6:43 am UTC
*/

class FirmRepository extends BaseRepository
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
        return Firm::class;
    }
}
