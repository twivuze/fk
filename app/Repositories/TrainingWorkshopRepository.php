<?php

namespace App\Repositories;

use App\Models\TrainingWorkshop;
use App\Repositories\BaseRepository;

/**
 * Class TrainingWorkshopRepository
 * @package App\Repositories
 * @version May 30, 2020, 6:34 am UTC
*/

class TrainingWorkshopRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'country',
        'email',
        'project_or_business_name',
        'What_is_your_project_or_business_about',
        'Business_location',
        'What_is_your_expectations_to_this_Training_or_what_do_you_want_to_learn',
        'Are_you_willing_to_obtain_a_participation_Certificate',
        'session_id',
        'approved'
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
        return TrainingWorkshop::class;
    }
}
