<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class News
 * @package App\Models
 * @version May 14, 2020, 3:26 pm UTC
 *
 * @property string $title
 * @property string $description
 * @property boolean $published
 */
class News extends Model
{

    public $table = 'news';
    



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
