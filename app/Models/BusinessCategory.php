<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class BusinessCategory
 * @package App\Models
 * @version May 25, 2020, 6:11 am UTC
 *
 * @property string $category
 * @property boolean $used
 */
class BusinessCategory extends Model
{

    public $table = 'BusinessCategories';
    



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
        
    ];

    public function getUsedAttribute($value)
        {
            return $value?'Yes':'No';
        }
}
