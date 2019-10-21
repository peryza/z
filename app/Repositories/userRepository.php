<?php

namespace App\Repositories;

use App\Models\user;
use App\Repositories\BaseRepository;

/**
 * Class userRepository
 * @package App\Repositories
 * @version September 26, 2019, 4:45 am UTC
*/

class userRepository extends BaseRepository
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
        return user::class;
    }
}
