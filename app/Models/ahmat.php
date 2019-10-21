<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ahmat
 * @package App\Models
 * @version September 26, 2019, 5:09 am UTC
 *
 * @property string Name
 * @property integer Age
 * @property string Work_Foot
 */
class ahmat extends Model
{

    public $table = 'ahmat_fc';
    


    public $fillable = [
        'Name',
        'Age',
        'Work_Foot'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Name' => 'string',
        'Age' => 'integer',
        'Work_Foot' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
