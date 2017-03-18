<?php

namespace App;

use App\Traits\HeaderableTrait;
use App\Traits\ImageableTrait;
use App\Traits\PhotoableTrait;
use App\Traits\ResourceableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use ImageableTrait, PhotoableTrait, Sluggable, SluggableScopeHelpers, ResourceableTrait, SearchableTrait, HeaderableTrait, LogsActivity;

    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'category_id', 'price', 'material', 'brief', 'text', 'available', 'image'];

    protected static $logAttributes = ['name', 'slug', 'category_id', 'price', 'material', 'brief', 'text', 'available', 'image'];

    protected $casts = [
        'price' => 'integer',
        'available' => 'boolean',
        'category_id' => 'int',
    ];

    protected $appends = ['img_url', 'photo_url'];

    protected $searchable = [
        'columns' => [
            'name' => 30,
            'brief' => 20,
            'text' => 10,
        ],
    ];

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

    /**
     * Get product category.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
