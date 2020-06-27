<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Statement
 * @package App\Models
 * @version June 5, 2020, 6:36 pm UTC
 *
 * @property string $title
 * @property string $contents
 * @property integer $numbering
 */
class Statement extends Model
{

    public $table = 'Statement';
    



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
        'numbering' => 'integer'
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
