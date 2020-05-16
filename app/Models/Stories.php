<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Stories
 * @package App\Models
 * @version May 14, 2020, 3:08 pm UTC
 *
 * @property string $title
 * @property string $description
 * @property string $image
 * @property boolean $published
 */
class Stories extends Model
{

    public $table = 'Stories';
    



    public $fillable = [
        'title',
        'description',
        'image',
        'published'
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
        'published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'published' => 'required'
    ];

    
}
