<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Contacts
 * @package App\Models
 * @version May 14, 2020, 3:39 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $phone
 */
class Contacts extends Model
{

    public $table = 'contacts';
    



    public $fillable = [
        'name',
        'email',
        'phone'
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
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required'
    ];

    
}
