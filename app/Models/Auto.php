<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Auto
 * @package App\Models
 * @version October 3, 2019, 6:37 am UTC
 *
 * @property string name
 * @property integer model
 */
class Auto extends Model
{

    public $table = 'Auto';
    


    public $fillable = [
        'name',
        'model'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'model' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function auto()
    {
     return $this->hasMany(\App\Models\Auto::class);
    }
    
}
