<?php

namespace App;

use App\Traits\HeaderableTrait;
use App\Traits\ImageableTrait;
use App\Traits\ResourceableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use NodeTrait, ImageableTrait, Sluggable, SluggableScopeHelpers, ResourceableTrait, HeaderableTrait, LogsActivity;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'about',
        'image',
        'parent_id',
        '_lft',
        '_rgt'
    ];

    protected static $logAttributes = [
        'name',
        'slug',
        'about',
        'image',
        'parent_id',
        '_lft',
        '_rgt'
    ];

    protected $appends = ['text', 'img_url'];

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
     * Get the text attribute.
     */
    public function getTextAttribute()
    {
        return $this->name;
    }

    /**
     * Get all products of category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Добавляем пробелы в начале названий категорий, чтобы была видна вложенность
     *
     * @param $categories
     */
    public static function addSpaces($categories)
    {
        /*$categories = Category::withDepth()->get()->toTree();
        $traverse = function ($categories) use (&$traverse) {
            foreach ($categories as $category) {
                $prefix = str_repeat(' ', $category->depth * 5);
                $category->name = $prefix . $category->name;
                $traverse($category->children);
            }
        };
        $traverse($categories);*/

        foreach ($categories as $category) {
            $prefix = str_repeat('-', $category->depth * 8);
            $category->name = $prefix . ' ' . $category->name;
        }
    }
}
