<?php

namespace App\Repositories;

use App\Models\ConferenceApplication;
use App\Repositories\BaseRepository;

/**
 * Class ConferenceApplicationRepository
 * @package App\Repositories
 * @version May 30, 2020, 5:55 am UTC
*/

class ConferenceApplicationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'address',
        'contact',
        'date_of_birth',
        'How _did _you_know_Yes_Conference',
        'Have_you_previously_attended_any_Yes_Conference',
        'If_ye_describe_the_year',
        'How_do_you_prefer_to_attend_the_coming_YES_conference',
        'Are_you_willing_to_obtain_a_participation_Certificate',
        'Can_you_describe_why_youth_think_Africas_youth_should_engage_in_entrepreneurship',
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
        return ConferenceApplication::class;
    }
}
