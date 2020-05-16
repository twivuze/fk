<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Photos
 * @package App\Models
 * @version May 14, 2020, 3:37 pm UTC
 *
 * @property integer $image
 */
class Photos extends Model
{

    public $table = 'photos';
    



    public $fillable = [
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
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
