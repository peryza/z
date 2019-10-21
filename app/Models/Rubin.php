<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Rubin
 * @package App\Models
 * @version September 29, 2019, 11:50 am UTC
 *
 * @property string name
 * @property integer age
 */
class Rubin extends Model
{

    public $table = 'Rubin';
    


    public $fillable = [
        'name',
        'age'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'age' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
