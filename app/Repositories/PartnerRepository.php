<?php

namespace App\Repositories;

use App\Models\Partner;
use App\Repositories\BaseRepository;

/**
 * Class PartnerRepository
 * @package App\Repositories
 * @version May 31, 2020, 10:38 pm UTC
*/

class PartnerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Company_or_organization',
        'Address',
        'Email',
        'Country',
        'Website',
        'Why_Do_you_want_to_partner_with_All_Trust_Consult',
        'In_which_area_will_the_partnership_focus_on',
        'Employee_name',
        'Employee_Contact',
        'Employee_Email',
        'Employee_Country',
        'Upload_Logo_Image',
        'approved',
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
        return Partner::class;
    }
}
