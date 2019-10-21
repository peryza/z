<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class UFA
 * @package App\Models
 * @version September 26, 2019, 5:16 am UTC
 *
 * @property string Name
 * @property integer Age
 */
class UFA extends Model
{

    public $table = 'UFA_FC';
    


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
