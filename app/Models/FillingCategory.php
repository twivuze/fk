<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class FillingCategory
 * @package App\Models
 * @version June 1, 2020, 5:13 pm UTC
 *
 * @property string $name
 * @property string $image
 * @property boolean $published
 */
class FillingCategory extends Model
{

    public $table = 'FillingCategories';
    



    public $fillable = [
        'name',
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
        'name' => 'string',
        'image' => 'string',
        'published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'image' => 'required',
        'published' => 'required'
    ];

    // public function getPublishedAttribute($value){
    //     return $value?'Yes':'No';
    // }
    
}
