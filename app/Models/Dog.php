<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Dog
 * @package App\Models
 * @version September 30, 2019, 4:59 am UTC
 *
 * @property string name
 */
class Dog extends Model
{

    public $table = 'dog';
    


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
