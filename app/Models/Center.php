<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Center
 * @package App\Models
 * @version May 25, 2020, 7:19 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $country
 * @property string $region
 * @property string $occupation
 * @property string $organization
 * @property string $q1
 * @property string $q2
 * @property string $q3
 * @property string $q4
 * @property string $q5
 * @property string $q6
 * @property string $q7
 * @property string $passport_size_photos_zipped
 * @property string $copies_national_identity_card_zipped
 * @property string $application_letter_written_by_applicant_pdf
 * @property string $cover_image
 * @property string $short_summary
 * @property string $description
 * @property string $status
 * @property integer $session_id
 */
class Center extends Model
{

    public $table = 'center';
    



    public $fillable = [
        'name',
        'email',
        'address',
        'country',
        'region',
        'occupation',
        'organization',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7',
        'passport_size_photos_zipped',
        'copies_national_identity_card_zipped',
        'application_letter_written_by_applicant_pdf',
        'cover_image',
        'short_summary',
        'description',
        'status',
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
        'country' => 'string',
        'region' => 'string',
        'occupation' => 'string',
        'organization' => 'string',
        'passport_size_photos_zipped' => 'string',
        'copies_national_identity_card_zipped' => 'string',
        'application_letter_written_by_applicant_pdf' => 'string',
        'cover_image' => 'string',
        'status' => 'string',
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
        'country' => 'required',
        'region' => 'required',
        'occupation' => 'required',
        'organization' => 'required',
        'q1' => 'required',
        'q2' => 'required',
        'q3' => 'required',
        'q4' => 'required',
        'q5' => 'required',
        'q6' => 'required',
        'q7' => 'required',
        'passport_size_photos_zipped' => "required|mimes:zip",
        'copies_national_identity_card_zipped' => "required|mimes:zip",
        'application_letter_written_by_applicant_pdf' => "required|mimes:pdf",
    ];

    
}
