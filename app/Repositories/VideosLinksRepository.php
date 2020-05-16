<?php

namespace App\Repositories;

use App\Models\VideosLinks;
use App\Repositories\BaseRepository;

/**
 * Class VideosLinksRepository
 * @package App\Repositories
 * @version May 14, 2020, 3:41 pm UTC
*/

class VideosLinksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'contents',
        'type',
        'link',
        'published'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return VideosLinks::class;
    }
}
