<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class torpedo
 * @package App\Models
 * @version September 26, 2019, 6:31 am UTC
 *
 * @property string name
 * @property integer age
 */
class torpedo extends Model
{

    public $table = 'torbedo_fc';
    


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
