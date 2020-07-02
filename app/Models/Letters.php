<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Letters
 * @package App\Models
 * @version July 2, 2020, 8:24 am UTC
 *
 * @property string $title
 * @property string $contents
 * @property integer $numbering
 * @property boolean $allow_to_apply
 */
class Letters extends Model
{

    public $table = 'letters';
    



    public $fillable = [
        'title',
        'contents',
        'numbering',
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
        'numbering' => 'integer',
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
        'numbering' => 'required'
    ];

    
}
