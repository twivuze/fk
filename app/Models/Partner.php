<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Partner
 * @package App\Models
 * @version May 31, 2020, 10:38 pm UTC
 *
 * @property string $Company_or_organization
 * @property integer $Address
 * @property string $Email
 * @property string $Country
 * @property string $Website
 * @property string $Why_Do_you_want_to_partner_with_All_Trust_Consult
 * @property string $In_which_area_will_the_partnership_focus_on
 * @property string $Employee_name
 * @property string $Employee_Contact
 * @property string $Employee_Email
 * @property string $Employee_Country
 * @property string $Upload_Logo_Image
 * @property boolean $approved
 * @property integer $session_id
 */
class Partner extends Model
{

    public $table = 'partners';
    



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Company_or_organization' => 'string',
        'Address' => 'integer',
        'Email' => 'string',
        'Country' => 'string',
        'Website' => 'string',
        'Employee_name' => 'string',
        'Employee_Contact' => 'string',
        'Employee_Email' => 'string',
        'Employee_Country' => 'string',
        'Upload_Logo_Image' => 'string',
        'approved' => 'boolean',
        'session_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Company_or_organization' => 'required',
        'Address' => 'required',
        'Email' => 'required',
        'Country' => 'required',
        'Website' => 'required',
        'Why_Do_you_want_to_partner_with_All_Trust_Consult' => 'required',
        'In_which_area_will_the_partnership_focus_on' => 'required',
        'Employee_name' => 'required',
        'Employee_Contact' => 'required',
        'Employee_Email' => 'required',
        'Employee_Country' => 'required',
        'Upload_Logo_Image' => "required|image|mimes:jpeg,png,jpg",
    ];

   
}
