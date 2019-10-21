<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Cat
 * @package App\Models
 * @version October 3, 2019, 6:33 am UTC
 *
 * @property string Name
 * @property integer species
 */
class Cat extends Model
{

    public $table = 'Cat';
    


    public $fillable = [
        'Name',
        'species'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Name' => 'string',
        'species' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
