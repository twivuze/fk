<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Photos
 * @package App\Models
 * @version June 29, 2020, 10:07 am UTC
 *
 * @property string $image
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
