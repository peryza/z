<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class car
 * @package App\Models
 * @version September 19, 2019, 5:46 am UTC
 *
 * @property string Model
 */
class car extends Model
{

    public $table = 'car';
    


    public $fillable = [
        'Model'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Model' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
