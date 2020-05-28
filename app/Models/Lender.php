<?php

namespace App\Models;

use Eloquent as Model;

use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardExpirationMonth;
use Illuminate\Http\Request;
/**
 * Class Lender
 * @package App\Models
 * @version May 23, 2020, 4:41 pm UTC
 *
 * @property string $name
 * @property string $contact
 * @property string $country
 * @property string $Occupation
 * @property string $which_business_you_are_willing_to_lend_to
 * @property string $why_did_you_choose_such_business
 * @property string $recurring
 * @property string $lenders_bank_details
 * @property string $lenders_passport_photo
 * @property string $lenders_copy_of_identity_card_or_passport
 * @property integer $session_id
 * @property string $status
 * @property string $email
 */
class Lender extends Model
{

    public $table = 'lender';
    



    public $fillable = [
        'name',
        'contact',
        'country',
        'Occupation',
        'lender_code',
        'which_business_you_are_willing_to_lend_to',
        'why_did_you_choose_such_business',
        'recurring',
        'lenders_bank_details',
        'lenders_passport_photo',
        'lenders_copy_of_identity_card_or_passport',
        'session_id',
        'status',
        'email',
        'lender_category_id',
        'card_number',
        'expiration_year',
        'expiration_month',
        'cvc',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'contact' => 'string',
        'country' => 'string',
        'Occupation' => 'string',
        'recurring' => 'string',
        'lenders_passport_photo' => 'string',
        'lenders_copy_of_identity_card_or_passport' => 'string',
        'session_id' => 'integer',
        'status' => 'string',
        'email' => 'string',
        'lender_category_id' => 'integer',
        'card_number' => 'integer',
        'expiration_year' => 'integer',
        'expiration_month' => 'integer',
        'cvc' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    // public static $rules = [
    //     'name' => 'required',
    //     'contact' => 'required',
    //     'country' => 'required',
    //     'Occupation' => 'required',
    //     'which_business_you_are_willing_to_lend_to' => 'required',
    //     'why_did_you_choose_such_business' => 'required',
    //     'recurring' => 'required',
    //     'lenders_bank_details' => "required|mimes:pdf",
    //     'lenders_passport_photo' => "required|image|mimes:jpeg,png,jpg",
    //     'lenders_copy_of_identity_card_or_passport' => "required|mimes:pdf",
    //     'email' =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
    //     'lender_category_id'=> 'required',
    //     'card_number' => ['required', new CardNumber],
    // ];

    public static  function rules()
{

    return [
        'name' => 'required',
        'contact' => 'required',
        'country' => 'required',
        'Occupation' => 'required',
        'which_business_you_are_willing_to_lend_to' => 'required',
        'why_did_you_choose_such_business' => 'required',
        'recurring' => 'required',
        'lenders_passport_photo' => "required|image|mimes:jpeg,png,jpg",
        'lenders_copy_of_identity_card_or_passport' => "required|mimes:pdf",
        'email' =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
        'lender_category_id'=> 'required',
        'card_number' => ['required', new CardNumber],
        'expiration_year' => ['required', new CardExpirationYear(request()->get('expiration_month'))],
            'expiration_month' => ['required', new CardExpirationMonth(request()->get('expiration_year'))],
            'cvc' => ['required', new CardCvc(request()->get('card_number'))]
    ];
}
    public function lenderCategory(){
        return $this->belongsTo('App\Models\LenderCategory','lender_category_id');
    }
    
}
