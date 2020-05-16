<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Teams
 * @package App\Models
 * @version May 14, 2020, 3:30 pm UTC
 *
 * @property string $avatar
 * @property string $full_name
 * @property string $title
 * @property string $email
 * @property string $phone
 * @property string $bio
 * @property boolean $published
 */
class Teams extends Model
{

    public $table = 'teams';
    



    public $fillable = [
        'avatar',
        'full_name',
        'title',
        'email',
        'phone',
        'bio',
        'published'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'avatar' => 'string',
        'full_name' => 'string',
        'title' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'required',
        'title' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'bio' => 'required',
        'published' => 'required'
    ];

    
}
