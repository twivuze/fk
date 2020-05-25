<?php

namespace App\Repositories;

use App\Models\LoanApplication;
use App\Repositories\BaseRepository;

/**
 * Class LoanApplicationRepository
 * @package App\Repositories
 * @version May 23, 2020, 3:55 pm UTC
*/

class LoanApplicationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'year_of_start-up',
        'your_business_working_days',
        'expected_average_customers_per_week',
        'loan_size',
        'why_this_loan_size',
        'what_makes_you_eligible_for_the_loan',
        'does_your_business_have_the_ability_to_make_the_loan_repayment_on_time',
        'what_makes_you_move_on_in_life',
        'what_is_your_ultimate_goal_in_life',
        'what_is_integrity_to_you',
        'additional_q1',
        'additional_q2',
        'additional_q3',
        'additional_q4',
        'upload_passport _photo',
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
        'session_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LoanApplication::class;
    }
}
