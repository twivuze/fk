<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Currency
 * @package App\Models
 * @version June 11, 2020, 4:30 pm UTC
 *
 * @property string $currency
 */
class Currency extends Model
{

    public $table = 'currencies';
    



    public $fillable = [
        'currency'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'currency' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'currency' => 'required'
    ];

    
}
