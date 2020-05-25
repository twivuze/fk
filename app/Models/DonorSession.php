<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class DonorSession
 * @package App\Models
 * @version May 23, 2020, 5:20 pm UTC
 *
 * @property string $title
 * @property string $contents
 * @property string $image
 * @property boolean $allow_to_apply
 */
class DonorSession extends Model
{

    public $table = 'donor_sessions';
    



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
