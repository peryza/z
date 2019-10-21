<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Client
 * @package App\Models
 * @version September 26, 2019, 7:05 am UTC
 *
 * @property string name
 */
class Client extends Model
{

    public $table = 'Client';
    


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
