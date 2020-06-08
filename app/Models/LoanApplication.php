<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LoanApplication
 * @package App\Models
 * @version May 23, 2020, 3:55 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $country
 * @property string $region
 * @property string $national_identity_number
 * @property string $contact
 * @property string $religion
 * @property string $marital_status
 * @property string $status
 * @property string $business_location_or_address
 * @property string $year_of_start-up
 * @property string $your_business_working_days
 * @property string $expected_average_customers_per_week
 * @property string $loan_size
 * @property string $why_this_loan_size
 * @property string $what_makes_you_eligible_for_the_loan
 * @property string $does_your_business_have_the_ability_to_make_the_loan_repayment_on_time
 * @property string $what_makes_you_move_on_in_life
 * @property string $what_is_your_ultimate_goal_in_life
 * @property string $what_is_integrity_to_you
 * @property string $additional_q1
 * @property string $additional_q2
 * @property string $additional_q3
 * @property string $additional_q4
 * @property string $upload_passport _photo
 * @property string $national_identity_copy
 * @property string $business_certificate
 * @property string $business_patent
 * @property string $any_recent_transactions_documents
 * @property string $formal_reference_name
 * @property string $formal_reference_phone
 * @property string $formal_reference_email
 * @property string $alternative_contact_name
 * @property string $alternative_contact_email
 * @property string $alternative_contact_phone
 * @property string $alternative_contact_id_number
 * @property integer $microfinance_center
 * @property integer $session_id
 */
class LoanApplication extends Model
{

    public $table = 'loan_applications';
    
    


    public $fillable = [
        'name',
        'email',
        'address',
        'country',
        'region',
        'national_identity_number',
        'contact',
        'religion',
        'marital_status',
        'status',
        'business_location_or_address',
        'year_of_start_up',
        'your_business_working_days',
        'expected_average_customers_per_week',
        'loan_size',
        'why_this_loan_size',
        'what_makes_you_eligible_for_the_loan',
        'can_make_loan_repayment_on_time',
        'what_makes_you_move_on_in_life',
        'what_is_your_ultimate_goal_in_life',
        'what_is_integrity_to_you',
        'additional_q1',
        'additional_q2',
        'additional_q3',
        'additional_q4',
        'additional_q5',
        'upload_passport_photo',
        'national_identity_copy',
        'business_certificate',
        'business_patent',
        'any_recent_transactions_documents',
        'formal_reference_name',
        'formal_reference_phone',
        'formal_reference_email',
        'alternative_contact_name',
        'alternative_contact_email',
        'alternative_contact_phone',
        'alternative_contact_id_number',
        'microfinance_center',
        'session_id',
        'category',
        'short_summary',
        'description',
        'business_model_file',
        'business_category_id',
        'user_id',
        'approved',
        'lender_initial_target',
        'donor_initial_target',
        'currency',
        'business_name',
        'fundraising_message',
        'budget'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'business_name'=> 'string',
        'email' => 'string',
        'address' => 'string',
        'country' => 'string',
        'region' => 'string',
        'national_identity_number' => 'string',
        'contact' => 'string',
        'religion' => 'string',
        'marital_status' => 'string',
        'status' => 'string',
        'business_location_or_address' => 'string',
        'year_of_start_up' => 'string',
        'your_business_working_days' => 'string',
        'expected_average_customers_per_week' => 'string',
        'loan_size' => 'string',
        'additional_q1' => 'string',
        'additional_q2' => 'string',
        'additional_q3' => 'string',
        'additional_q4' => 'string',
        'additional_q5' => 'string',
        'upload_passport_photo' => 'string',
        'national_identity_copy' => 'string',
        'business_certificate' => 'string',
        'business_patent' => 'string',
        'any_recent_transactions_documents' => 'string',
        'formal_reference_name' => 'string',
        'formal_reference_phone' => 'string',
        'formal_reference_email' => 'string',
        'alternative_contact_name' => 'string',
        'alternative_contact_email' => 'string',
        'alternative_contact_phone' => 'string',
        'alternative_contact_id_number' => 'string',
        'microfinance_center' => 'integer',
        'session_id' => 'integer',
        'category' => 'string',
        'business_model_file'=>'string',
        'views'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'business_name'=> 'required',
        'email' =>  ['unique:users'],
        'address' => 'required',
        'country' => 'required',
        'region' => 'required',
        'national_identity_number' => 'required',
        'contact' => 'required',
        'religion' => 'required',
        'marital_status' => 'required',
        'status' => 'required',
        'business_location_or_address' => 'required',
        'year_of_start_up' => 'required',
        'your_business_working_days' => 'required',
        'expected_average_customers_per_week' => 'required',
        'loan_size' => 'required',
        'why_this_loan_size' => 'required',
        'what_makes_you_eligible_for_the_loan' => 'required',
        'can_make_loan_repayment_on_time' => 'required',
        'what_makes_you_move_on_in_life' => 'required',
        'what_is_your_ultimate_goal_in_life' => 'required',
        'what_is_integrity_to_you' => 'required',
        'additional_q1' => 'required',
        'additional_q2' => 'required',
        'additional_q3' => 'required',
        'additional_q4' => 'required',
        'additional_q5' => 'required',
        'formal_reference_name' => '',
        'formal_reference_phone' => '',
        'formal_reference_email' => '',
        'alternative_contact_name' => '',
        'alternative_contact_email' => '',
        'alternative_contact_phone' => '',
        'alternative_contact_id_number' => '',
        'upload_passport_photo' =>  "required|image|mimes:jpeg,png,jpg",
        'national_identity_copy' =>  "mimes:pdf",
        'business_certificate' =>  "mimes:pdf",
        'business_patent' =>  "mimes:pdf",
        'any_recent_transactions_documents' =>  "mimes:pdf",
        
    ];

    public function center(){
        return $this->belongsTo('App\Models\Center','microfinance_center');
    }
    public function businessCategory(){
        return $this->belongsTo('App\Models\BusinessCategory','business_category_id');
    }
    //businessCategory
}
