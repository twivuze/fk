<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LenderSession
 * @package App\Models
 * @version May 23, 2020, 5:18 pm UTC
 *
 * @property string $title
 * @property string $contents
 * @property string $image
 * @property boolean $allow_to_apply
 */
class LenderSession extends Model
{

    public $table = 'lender_sessions';
    



    public $fillable = [
        'title',
        'contents',
        'image',
        'allow_to_apply'
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
        'allow_to_apply' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function getAllowToApplyAttribute($value){
            return $value?'Yes':'No';
    }
}
