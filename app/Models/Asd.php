<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Asd
 * @package App\Models
 * @version September 26, 2019, 5:06 am UTC
 *
 * @property string name
 */
class Asd extends Model
{

    public $table = 'Asd';
    


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
