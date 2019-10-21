<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class orenburg
 * @package App\Models
 * @version September 26, 2019, 5:14 am UTC
 *
 * @property integer age
 */
class orenburg extends Model
{

    public $table = 'orenburg';
    


    public $fillable = [
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
