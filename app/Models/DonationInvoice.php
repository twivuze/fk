<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class DonationInvoice
 * @package App\Models
 * @version June 3, 2020, 6:46 am UTC
 *
 * @property integer $donor_id
 * @property integer $enterprise_id
 * @property string $donor
 * @property string $enterprise
 * @property number $amount
 * @property integer $center_id
 */
class DonationInvoice extends Model
{

    public $table = 'donation_invoices';
    



    public $fillable = [
        'donor_id',
        'enterprise_id',
        'donor',
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
        'donor_id' => 'integer',
        'enterprise_id' => 'integer',
        'donor' => 'string',
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
        'donor_id' => 'required',
        'enterprise' => 'required',
        'amount' => 'required',
        'donor' => 'required'
    ];
    public function getCreatedAtAttribute($value){
        return date("d M Y",strtotime($value)) .', '. date("h:i A",strtotime($value));
    }
    
}
