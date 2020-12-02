<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Transaction
 * @package App\Models
 * @version December 2, 2020, 2:53 pm UTC
 *
 * @property string $payment_status
 * @property number $amount
 * @property integer $book_id
 * @property string $currency
 */
class Transaction extends Model
{

    public $table = 'transactions';
    



    public $fillable = [
        'payment_status',
        'amount',
        'book_id',
        'currency'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'payment_status' => 'string',
        'amount' => 'float',
        'book_id' => 'integer',
        'currency' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function book(){
        return $this->belongsTo('App\Models\Books','book_id');
    }
}
