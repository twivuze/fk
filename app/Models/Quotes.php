<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Quotes
 * @package App\Models
 * @version June 25, 2020, 4:15 pm UTC
 *
 * @property string $quote_owner
 * @property string $quote
 * @property string $avatar
 * @property string $slider_image
 * @property boolean $publish
 */
class Quotes extends Model
{

    public $table = 'quotes';
    



    public $fillable = [
        'quote_owner',
        'quote',
        'avatar',
        'slider_image',
        'publish',
        'quote_date'
        ,'enable_slider_show'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'quote_owner' => 'string',
        'avatar' => 'string',
        'slider_image' => 'string',
        'publish' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'quote_owner' => 'required',
        'quote' => 'required',
        'avatar' => 'required',
        'slider_image' => 'required',
        'publish' => 'required',
        'quote_date' => 'required'
    ];

    
}
