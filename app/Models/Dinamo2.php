<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Dinamo2
 * @package App\Models
 * @version September 29, 2019, 11:59 am UTC
 *
 * @property string name
 */
class Dinamo2 extends Model
{

    public $table = 'Dinamo2';
    


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
