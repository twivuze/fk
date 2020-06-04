<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ConferenceSession
 * @package App\Models
 * @version May 30, 2020, 5:20 am UTC
 *
 * @property string $title
 * @property string $contents
 * @property string $image
 * @property boolean $allow_to_apply
 */
class ConferenceSession extends Model
{

    public $table = 'conference_sessions';
    



    public $fillable = [
        'title',
        'contents',
        'image',
        'event_date',
        'event_time',
        'event_location',
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