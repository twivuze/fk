<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TeamCategory
 * @package App\Models
 * @version June 27, 2020, 9:20 am UTC
 *
 * @property string $name
 * @property integer $numbering
 * @property boolean $published
 */
class TeamCategory extends Model
{

    public $table = 'team_categories';
    



    public $fillable = [
        'name',
        'numbering',
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
        'numbering' => 'integer',
        'published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'numbering' => 'required',
        'published' => 'required'
    ];

}
