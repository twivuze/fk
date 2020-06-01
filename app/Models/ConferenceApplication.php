<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ConferenceApplication
 * @package App\Models
 * @version May 30, 2020, 5:55 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $contact
 * @property string $date_of_birth
 * @property string $How _did _you_know_Yes_Conference
 * @property string $Have_you_previously_attended_any_Yes_Conference
 * @property string $If_ye_describe_the_year
 * @property string $How_do_you_prefer_to_attend_the_coming_YES_conference
 * @property string $Are_you_willing_to_obtain_a_participation_Certificate
 * @property string $Can_you_describe_why_youth_think_Africas_youth_should_engage
 * @property string $Why_are_you_interested_in_YES_AWARD_competition
 * @property string $Project_name
 * @property string $What_is_it_about
 * @property string $What_is_the_status_of_your_project
 * @property string $Are_you_willing_to_apply_for_your_project_loan
 * @property string $If_yes_mention_the_range_of_the_loan_amount
 * @property string $Upload_your_business_project_plan
 * @property integer $session_id
 */
class ConferenceApplication extends Model
{

    public $table = 'conference_applications';
    



    public $fillable = [
        'name',
        'email',
        'address',
        'contact',
        'date_of_birth',
        'How_did_you_know_Yes_Conference',
        'Have_you_previously_attended_any_Yes_Conference',
        'If_ye_describe_the_year',
        'How_do_you_prefer_to_attend_the_coming_YES_conference',
        'Are_you_willing_to_obtain_a_participation_Certificate',
        'Can_you_describe_why_youth_think_Africas_youth_should_engage',
        'Why_are_you_interested_in_YES_AWARD_competition',
        'Project_name',
        'What_is_it_about',
        'What_is_the_status_of_your_project',
        'Are_you_willing_to_apply_for_your_project_loan',
        'If_yes_mention_the_range_of_the_loan_amount',
        'Upload_your_business_project_plan',
        'session_id'
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
        'date_of_birth' => 'string',
        'Have_you_previously_attended_any_Yes_Conference' => 'string',
        'How_do_you_prefer_to_attend_the_coming_YES_conference' => 'string',
        'Are_you_willing_to_obtain_a_participation_Certificate' => 'string',
        'Project_name' => 'string',
        'What_is_the_status_of_your_project' => 'string',
        'Are_you_willing_to_apply_for_your_project_loan' => 'string',
        'If_yes_mention_the_range_of_the_loan_amount' => 'string',
        'Upload_your_business_project_plan' => 'string',
        'session_id' => 'integer'
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
        'date_of_birth' => 'required',
        'How_did_you_know_Yes_Conference' => 'required',
        'Have_you_previously_attended_any_Yes_Conference' => 'required',
        'How_do_you_prefer_to_attend_the_coming_YES_conference' => 'required',
        'Are_you_willing_to_obtain_a_participation_Certificate' => 'required',
        'Can_you_describe_why_youth_think_Africas_youth_should_engage' => 'required',
    ];

    
}
