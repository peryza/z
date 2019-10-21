<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Model
 * @package App\Models
 * @version October 3, 2019, 6:41 am UTC
 *
 * @property string Name
 */
class Model extends Model
{

    public $table = 'Model';
    


    public $fillable = [
        'Name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
