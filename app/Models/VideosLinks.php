<?php

namespace App\Models;
use Cohensive\Embed\Facades\Embed;
use Eloquent as Model;

/**
 * Class VideosLinks
 * @package App\Models
 * @version May 14, 2020, 3:41 pm UTC
 *
 * @property string $title
 * @property string $contents
 * @property string $type
 * @property string $link
 * @property boolean $published
 */
class VideosLinks extends Model
{

    public $table = 'videos_links';
    



    public $fillable = [
        'title',
        'contents',
        'type',
        'link',
        'published'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'type' => 'string',
        'link' => 'string',
        'published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'title' => 'required',
        'type' => 'required',
        'link' => 'required',
        'published' => 'required'
    ];


    public function getLinkHtmlAttribute()
    {
        if($this->type === 'YoutubeLink'){
            
            $embed = Embed::make($this->link)->parseUrl();
           
            if (!$embed)
                return '';

            $embed->setAttribute([
                'width' => '100%',
                'height' => 300,
                'frameborder' => 0,
                'allowfullscreen' => true
                ]);
           
            return $embed->getHtml();

        }else{
            return $this->links;
        }
       
    }
    
}
