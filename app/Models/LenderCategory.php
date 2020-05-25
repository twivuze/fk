<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LenderCategory
 * @package App\Models
 * @version May 25, 2020, 6:10 am UTC
 *
 * @property integer $category
 * @property boolean $used
 */
class LenderCategory extends Model
{

    public $table = 'LenderCategories';
    



    public $fillable = [
        'category',
        'used'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category' => 'string',
        'used' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category' => 'required'
    ];

    public function getUsedAttribute($value)
        {
            return $value?'Yes':'No';
        }
}
