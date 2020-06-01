<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class PartenerSession
 * @package App\Models
 * @version May 31, 2020, 10:20 pm UTC
 *
 * @property string $title
 * @property string $contents
 * @property string $image
 * @property boolean $allow_to_apply
 */
class PartenerSession extends Model
{

    public $table = 'partener_sessions';
    



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
        'contents' => 'required'
    ];

    public function getAllowToApplyAttribute($value){
        return $value?'Yes':'No';
    }
    
}
