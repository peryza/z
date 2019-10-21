<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Dinamo
 * @package App\Models
 * @version September 29, 2019, 11:44 am UTC
 *
 * @property string Name
 * @property integer Age
 */
class Dinamo extends Model
{

    public $table = 'Dinamo';
    


    public $fillable = [
        'Name',
        'Age'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Name' => 'string',
        'Age' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
