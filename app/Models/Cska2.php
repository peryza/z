<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Cska2
 * @package App\Models
 * @version September 30, 2019, 4:38 am UTC
 *
 * @property string Name
 * @property integer Age
 */
class Cska2 extends Model
{

    public $table = 'Cska2';
    


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
