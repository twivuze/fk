<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Period
 * @package App\Models
 * @version June 11, 2020, 11:17 pm UTC
 *
 * @property string $name
 * @property integer $period
 * @property string $category
 */
class Period extends Model
{

    public $table = 'periods';
    



    public $fillable = [
        'name',
        'period',
        'category'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'period' => 'integer',
        'category' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
