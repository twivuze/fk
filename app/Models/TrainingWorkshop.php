<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TrainingWorkshop
 * @package App\Models
 * @version May 30, 2020, 6:34 am UTC
 *
 * @property string $name
 * @property string $address
 * @property string $country
 * @property string $email
 * @property string $project_or_business_name
 * @property string $What_is_your_project_or_business_about
 * @property string $Business_location
 * @property string $What_is_your_expectations_to_this_Training
 * @property string $Are_you_willing_to_obtain_a_participation_Certificate
 * @property integer $session_id
 * @property boolean $approved
 */
class TrainingWorkshop extends Model
{

    public $table = 'training_workshops';
    



    public $fillable = [
        'name',
        'address',
        'country',
        'email',
        'project_or_business_name',
        'What_is_your_project_or_business_about',
        'Business_location',
        'What_is_your_expectations_to_this_Training',
        'Are_you_willing_to_obtain_a_participation_Certificate',
        'session_id',
        'approved'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'country' => 'string',
        'email' => 'string',
        'project_or_business_name' => 'string',
        'Business_location' => 'string',
        'Are_you_willing_to_obtain_a_participation_Certificate' => 'string',
        'session_id' => 'integer',
        'approved' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'address' => 'required',
        'country' => 'required',
        'email' => 'required',
        'project_or_business_name' => 'required',
        'What_is_your_project_or_business_about' => 'required',
        'Business_location' => 'required',
        'What_is_your_expectations_to_this_Training' => 'required',
        'Are_you_willing_to_obtain_a_participation_Certificate' => 'required'
    ];

    public function getApprovedAttribute($value){
        return $value?'Yes':'No';
    }
    
}
