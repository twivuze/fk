<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class AboutSections
 * @package App\Models
 * @version May 14, 2020, 3:32 pm UTC
 *
 * @property string $name
 * @property integer $position
 */
class AboutSections extends Model
{

    public $table = 'about_sections';
    



    public $fillable = [
        'name',
        'position'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'position' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
