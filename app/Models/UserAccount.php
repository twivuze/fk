<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class UserAccount
 * @package App\Models
 * @version May 20, 2020, 1:21 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $type
 * @property integer $status
 */
class UserAccount extends Model
{

    public $table = 'user_acounts';
    



    public $fillable = [
        'name',
        'email',
        'password',
        'type',
        'status'
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
        'password' => 'string',
        'type' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'type' => 'required',
        'status' => 'required'
    ];

    
}
