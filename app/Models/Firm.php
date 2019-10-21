<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Firm
 * @package App\Models
 * @version October 3, 2019, 6:43 am UTC
 *
 * @property string name
 */
class Firm extends Model
{

    public $table = 'Firm';
    


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
    public function  firm()
    {
        return $this->belongsTo(\App\Models\Firm::class,'model','id');
    }
    
}
