<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Transfer
 * @package App\Models
 * @version June 11, 2020, 9:31 pm UTC
 *
 * @property string $type
 * @property string $code
 * @property string $enterprise
 * @property integer $amount
 * @property string $currency
 * @property string $grace_period
 * @property string $grace_period_from
 * @property string $grace_period_to
 * @property string $instalment
 * @property integer $reminder_days
 * @property number $rate
 * @property integer $enterprise_id
 */
class Transfer extends Model
{

    public $table = 'transfers';
    



    public $fillable = [
        'type',
        'code',
        'enterprise',
        'amount',
        'currency',
        'grace_period',
        'grace_period_from',
        'grace_period_to',
        'instalment',
        'reminder_days',
        'rate',
        'enterprise_id',
        'recover_period'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'code' => 'string',
        'enterprise' => 'string',
        'amount' => 'integer',
        'currency' => 'string',
        'grace_period' => 'string',
        'grace_period_from' => 'date',
        'grace_period_to' => 'date',
        'instalment' => 'integer',
        'reminder_days' => 'integer',
        'rate' => 'float',
        'enterprise_id' => 'integer',
        'recover_period' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'amount' => 'required',
        'currency' => 'required',
    ];

    public function instalmentPeriod(){
        return $this->belongsTo('App\Models\Period','instalment');
    }

    public function recoverPeriod(){
        return $this->belongsTo('App\Models\Period','recover_period');
    }
}
