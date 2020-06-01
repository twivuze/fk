<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class FillingDocument
 * @package App\Models
 * @version June 1, 2020, 5:24 pm UTC
 *
 * @property string $name
 * @property string $file_name
 * @property integer $filling_category_id
 * @property integer $center_id
 * @property integer $microfund_manager_id
 * @property string $filling_category
 * @property string $country
 * @property boolean $published
 */
class FillingDocument extends Model
{

    public $table = 'filling_documents';
    



    public $fillable = [
        'name',
        'file_name',
        'filling_category_id',
        'center_id',
        'microfund_manager_id',
        'filling_category',
        'country',
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
        'file_name' => 'string',
        'filling_category_id' => 'integer',
        'center_id' => 'integer',
        'microfund_manager_id' => 'integer',
        'filling_category' => 'string',
        'country' => 'string',
        'published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'file_name' =>  "required|mimes:pdf",
        'filling_category_id' => 'required',
        'country' => 'required'
    ];
//fillingCat
public function fillingCat(){
    return $this->belongsTo('App\Models\FillingCategory','filling_category_id');
}
    // public function getPublishedAttribute($value){
    //     return $value?'Yes':'No';
    // }

}
