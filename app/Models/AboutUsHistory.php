<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class AboutUsHistory
 * @package App\Models
 * @version May 14, 2020, 3:36 pm UTC
 *
 * @property string $title
 * @property string $image
 * @property string $description
 */
class AboutUsHistory extends Model
{

    public $table = 'about_us_history';
    



    public $fillable = [
        'title',
        'image',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
