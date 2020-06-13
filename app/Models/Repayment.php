<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Repayment
 * @package App\Models
 * @version June 13, 2020, 9:57 am UTC
 *
 * @property integer $loan_id
 * @property integer $enterprise_id
 * @property string $repay_code
 * @property string $status
 * @property string $currency
 * @property string $repayer
 * @property string $repay_date
 * @property string $next_repay_date
 * @property integer $interest_amount
 * @property integer $amount_without_interst
 * @property integer $total_amount
 * @property integer $repay_reminder_day
 * @property integer $center_id
 * @property boolean $did_repay
 * @property integer $total_loan_remain_amount
 */
class Repayment extends Model
{

    public $table = 'repayments';
    



    public $fillable = [
        'loan_id',
        'enterprise_id',
        'repay_code',
        'status',
        'currency',
        'repayer',
        'repay_date',
        'next_repay_date',
        'interest_amount',
        'amount_without_interst',
        'total_amount',
        'repay_reminder_day',
        'center_id',
        'did_repay',
        'total_loan_remain_amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'loan_id' => 'integer',
        'enterprise_id' => 'integer',
        'repay_code' => 'string',
        'status' => 'string',
        'currency' => 'string',
        'repayer' => 'string',
        'repay_date' => 'date',
        'next_repay_date' => 'date',
        'interest_amount' => 'float',
        'amount_without_interst' => 'float',
        'total_amount' => 'float',
        'repay_reminder_day' => 'integer',
        'center_id' => 'integer',
        'did_repay' => 'boolean',
        'total_loan_remain_amount' => 'float'
    ];

    public function getRepayDateAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }
    public function getNextRepayDateAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
