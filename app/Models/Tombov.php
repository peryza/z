<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Tombov
 * @package App\Models
 * @version September 26, 2019, 6:52 am UTC
 *
 * @property string name
 * @property integer age
 */
class Tombov extends Model
{

    public $table = 'Tombov';
    


    public $fillable = [
        'name',
        'age',
        'created_at',
        'updated_at'
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
