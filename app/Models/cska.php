<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class cska
 * @package App\Models
 * @version September 23, 2019, 3:26 am UTC
 *
 * @property integer name
 */
class cska extends Model
{

    public $table = 'cskas';
    


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
        'name' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
