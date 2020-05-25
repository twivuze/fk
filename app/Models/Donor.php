<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Donor
 * @package App\Models
 * @version May 23, 2020, 4:50 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $contact
 * @property string $Occupation
 * @property string $which_business_models_are_you_willing_to_donate_to
 * @property string $why_did_you_choose_such_business
 * @property string $requiring
 * @property string $donors_bank_details
 * @property string $donors_passport_photo
 * @property string $donors_copy_of_identity_card_or_passport
 * @property integer $session_id
 * @property string $status
 */
class Donor extends Model
{

    public $table = 'donors';
    



    public $fillable = [
        'name',
        'email',
        'address',
        'contact',
        'country',
        'Occupation',
        'which_business_models_are_you_willing_to_donate_to',
        'why_did_you_choose_such_business',
        'requiring',
        'donors_bank_details',
        'donors_passport_photo',
        'donors_copy_of_identity_card_or_passport',
        'session_id',
        'donor_category_id',
        'status',
        'donor_code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'address' => 'string',
        'contact' => 'string',
        'country' => 'string',
        'Occupation' => 'string',
        'requiring' => 'string',
        'donors_bank_details' => 'string',
        'donors_passport_photo' => 'string',
        'donors_copy_of_identity_card_or_passport' => 'string',
        'session_id' => 'integer',
        'status' => 'string',
        'donor_category_id'=> 'string',
        'donor_code' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'contact' => 'required',
        'country'  => 'required',
        'Occupation' => 'required',
        'which_business_models_are_you_willing_to_donate_to' => 'required',
        'why_did_you_choose_such_business' => 'required',
        'requiring' => 'required',
        'donors_bank_details' => "required|mimes:pdf",
        'donors_passport_photo' => "required|image|mimes:jpeg,png,jpg",
        'donors_copy_of_identity_card_or_passport' => "required|mimes:pdf",
        'donor_category_id' => 'required'
    ];
    public function donorCategory(){
        return $this->belongsTo('App\Models\LenderCategory','donor_category_id');
    }
    
}
