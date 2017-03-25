<?php

namespace App;

use App\Traits\ImageableTrait;
use App\Traits\ResourceableTrait;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class News extends Model
{
    use ImageableTrait, ResourceableTrait, SearchableTrait, LogsActivity;

    protected $table = 'news';

    protected $fillable = ['title', 'text', 'image', 'published_at'];

    protected static $logAttributes = ['title', 'text', 'image', 'published_at'];

    protected $dates = ['created_at', 'updated_at', 'published_at'];

    protected $appends = ['img_url'];

    protected $searchable = [
        'columns' => [
            'title' => 70,
            'text' => 30,
        ],
    ];
}
