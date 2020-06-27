<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Team
 * @package App\Models
 * @version June 10, 2020, 10:32 am UTC
 *
 * @property string name
 * @property string title
 * @property string country
 * @property string bio
 * @property integer team_category_id
 * @property boolean published
 */
class Team extends Model
{

    public $table = 'teams';
    


    public $fillable = [
        'name',
        'title',
        'country',
        'bio',
        'numbering',
        'team_category_id',
        'published','image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'title' => 'string',
        'image' => 'string',
        'country' => 'string',
        'team_category_id' => 'integer',
        'published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'title' => 'required',
        'country' => 'required',
        'bio' => 'required',
        'team_category_id' => 'required',
        'published' => 'required',
        'image' => "required|image|mimes:jpeg,png,jpg",
    ];

    public function category(){
        return $this->belongsTo('App\Models\TeamCategory','team_category_id');
    }
    
}
