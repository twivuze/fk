<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class FunderManagerSession
 * @package App\Models
 * @version May 30, 2020, 5:22 am UTC
 *
 * @property string $title
 * @property string $contents
 * @property string $image
 * @property boolean $allow_to_apply
 */
class FunderManagerSession extends Model
{

    public $table = 'funder_manager_sessions';
    



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
        'title' => 'required',
        'contents' => 'required',
        'image' => 'required'
    ];
    public function getAllowToApplyAttribute($value){
        return $value?'Yes':'No';
    }
    
}
