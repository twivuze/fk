<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class MicroFund Application
 * @package App\Models
 * @version May 20, 2020, 8:57 am UTC
 *
 * @property string $full_name
 * @property string $email
 * @property string $address
 * @property string $religion
 * @property string $marital_status
 * @property string $gender
 * @property string $q1_1
 * @property string $q1_2
 * @property string $q1_3
 * @property string $q1_4
 * @property string $q2_1
 * @property string $q2_2
 * @property string $q2_3
 * @property string $q3_1
 * @property string $q3_2
 * @property string $q3_3
 * @property string $q4_1
 * @property string $q4_2
 * @property string $q4_3
 * @property string $q4_4
 * @property string $q5_1
 * @property string $q5_2
 * @property string $q5_3
 * @property string $phone_number
 */
class MicroFundApplication extends Model
{

    public $table = 'microfund_applications';
    



    public $fillable = [
        'full_name',
        'email',
        'address',
        'religion',
        'marital_status',
        'gender',
        'q1_1',
        'q1_2',
        'q1_3',
        'q1_4',
        'q2_1',
        'q2_2',
        'q2_3',
        'q3_1',
        'q3_2',
        'q3_3',
        'q4_1',
        'q4_2',
        'q4_3',
        'q4_4',
        'q5_1',
        'q5_2',
        'q5_3',
        'phone_number','user_id','status',
        'microfinance_center',
        'approved'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'full_name' => 'string',
        'email' =>'string',
        'address' => 'string',
        'religion' => 'string',
        'marital_status' => 'string',
        'gender' => 'string',
        'q5_3' => 'string',
        'phone_number' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'required',
        'email' =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
        'address' => 'required',
        'religion' => 'required',
        'marital_status' => 'required',
        'gender' => 'required',
        'phone_number' => 'required',
        'q1_1'=> 'required',
        'q1_2'=> 'required',
        'q1_3'=> 'required',
        'q1_4'=> 'required',
        'q2_1'=> 'required',
        'q2_2'=> 'required',
        'q2_3'=> 'required',
        'q3_1'=> 'required',
        'q3_2'=> 'required',
        'q3_3'=> 'required',
        'q4_1'=> 'required',
        'q4_2'=> 'required',
        'q4_3'=> 'required',
        'q4_4'=> 'required',
        'q5_1'=> 'required',
        'q5_2'=> 'required',
        'q5_3'=> 'required',
    ];

    public function center(){
        return $this->belongsTo('App\Models\Center','microfinance_center');
    }
}
