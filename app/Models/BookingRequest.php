<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class BookingRequest
 * @package App\Models
 * @version June 29, 2020, 7:04 am UTC
 *
 * @property string $full_name
 * @property string $address
 * @property string $street_address
 * @property string $phone_number
 * @property string $city
 * @property string $province
 * @property string $country
 * @property string $company_or_Initiative
 * @property string $title
 * @property string $function
 * @property string $q1
 * @property string $q2
 */
class BookingRequest extends Model
{

    public $table = 'booking_request';
    



    public $fillable = [
        'full_name',
        'address',
        'street_address',
        'phone_number',
        'city',
        'province',
        'country',
        'company_or_Initiative',
        'title',
        'function',
        'q1',
        'q2',
        'q3',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'full_name' => 'string',
        'address' => 'string',
        'street_address' => 'string',
        'phone_number' => 'string',
        'city' => 'string',
        'province' => 'string',
        'country' => 'string',
        'company_or_Initiative' => 'string',
        'title' => 'string',
        'function' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'required',
        'address' => 'required',
        'street_address' => 'required',
        'phone_number' => 'required',
        'city' => 'required',
        'province' => 'required',
        'country' => 'required',
        'company_or_Initiative' => 'required',
        'title' => 'required',
        'function' => 'required',
        'q1' => 'required',
        'q2' => 'required','email'=> 'required'
    ];

    
}
