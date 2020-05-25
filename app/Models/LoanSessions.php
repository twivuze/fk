<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LoanSessions
 * @package App\Models
 * @version May 23, 2020, 3:20 pm UTC
 *
 * @property string $title
 * @property string $contents
 * @property string $images
 * @property boolean $allow_application
 */
class LoanSessions extends Model
{

    public $table = 'loan_sessions';
    



    public $fillable = [
        'title',
        'contents',
        'image',
        'allow_application'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'image' => 'string',
        'allow_application' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    public function getAllowApplicationAttribute($value){
        return $value?'Yes':'No';
}
    
}
