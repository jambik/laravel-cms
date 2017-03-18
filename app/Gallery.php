<?php

namespace App;

use App\Traits\HeaderableTrait;
use App\Traits\ImageableTrait;
use App\Traits\PhotoableTrait;
use App\Traits\ResourceableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Gallery extends Model
{
    use ImageableTrait, PhotoableTrait, Sluggable, SluggableScopeHelpers, ResourceableTrait, HeaderableTrait, LogsActivity;

    protected $table = 'galleries';

    protected $fillable = ['name', 'slug', 'text', 'image'];

    protected static $logAttributes = ['name', 'slug', 'text', 'image'];

    protected $appends = ['img_url', 'photo_url'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
