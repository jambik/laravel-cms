<?php

namespace App;

use App\Traits\HeaderableTrait;
use App\Traits\ResourceableTrait;
use Conner\Tagging\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class Article extends Model
{
    use Sluggable, SluggableScopeHelpers, SortableTrait, ResourceableTrait, Taggable, HeaderableTrait, LogsActivity;

    protected $table = 'articles';

    protected $fillable = ['name', 'slug', 'text'];

    protected static $logAttributes = ['name', 'slug', 'text'];

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

    public function getTagsStringAttribute()
    {
        return implode(',', $this->tags->pluck('name')->all());
    }
}
