<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class SubsidiaryCompanies
 * @package App\Models
 * @version June 29, 2020, 10:08 am UTC
 *
 * @property string $name
 * @property string $url
 * @property boolean $published
 */
class SubsidiaryCompanies extends Model
{

    public $table = 'subsidiary_companies';
    



    public $fillable = [
        'name',
        'url',
        'published'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'url' => 'required'
    ];

    
}
