<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class EnterpriseCategory
 * @package App\Models
 * @version May 25, 2020, 6:14 am UTC
 *
 * @property string $category
 * @property integer $positioning
 * @property boolean $used
 */
class EnterpriseCategory extends Model
{

    public $table = 'EnterpriseCategories';
    



    public $fillable = [
        'category',
        'positioning',
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
        'positioning' => 'integer',
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
