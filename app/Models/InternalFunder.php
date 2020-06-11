<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class InternalFunder
 * @package App\Models
 * @version June 11, 2020, 4:28 pm UTC
 *
 * @property string $type
 * @property string $fund
 * @property string $currency
 */
class InternalFunder extends Model
{

    public $table = 'internal_funders';
    



    public $fillable = [
        'type',
        'fund',
        'currency',
        'enterprise_id',
        'code',
        'enterprise'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'fund' => 'string',
        'currency' => 'string',
        'enterprise_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required',
        'fund' => 'required',
        'enterprise_id' => 'required'
        
    ];

    
}
