<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    use LogsActivity;
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['post_title', 'post_slug', 'post_teaser', 'post_content', 'post_image', 'post_image_desc'];

    public function categories()
    {
        return $this->belongsTo('App\Category', 'cateId', 'id');
    }

    public function sluggable()
    {
        return [
            'post_slug' => [
                'source' => 'post_temp_slug'
            ]
        ];
    }

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
