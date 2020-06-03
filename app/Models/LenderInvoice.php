<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LenderInvoice
 * @package App\Models
 * @version June 3, 2020, 6:44 am UTC
 *
 * @property integer $enterprise_id
 * @property integer $lender_id
 * @property integer $lender
 * @property integer $enterprise
 * @property number $amount
 * @property integer $center_id
 */
class LenderInvoice extends Model
{

    public $table = 'lender_invoices';
    



    public $fillable = [
        'enterprise_id',
        'lender_id',
        'lender',
        'enterprise',
        'amount',
        'center_id',
        'payment_status',
        'payment_type',
        'receipt_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'enterprise_id' => 'integer',
        'lender_id' => 'integer',
        'lender' => 'string',
        'enterprise' => 'string',
        'amount' => 'float',
        'center_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'enterprise_id' => 'required',
        'lender_id' => 'required',
        'enterprise' => 'required',
        'amount' => 'required',
        'lender' => 'required'
    ];


    public function getCreatedAtAttribute($value){
        return date("d M Y",strtotime($value)) .', '. date("h:i A",strtotime($value));
    }
}
