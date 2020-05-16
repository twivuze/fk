<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class AboutContents
 * @package App\Models
 * @version May 14, 2020, 3:33 pm UTC
 *
 * @property string $image
 * @property integer $about_section_id
 */
class AboutContents extends Model
{

    public $table = 'about_contents';
    



    public $fillable = [
        'image',
        'about_section_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'about_section_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required',
        'about_section_id' => 'required'
    ];

    
}
