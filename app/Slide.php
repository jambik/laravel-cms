<?php

namespace App;

use App\Traits\ImageableTrait;
use App\Traits\ResourceableTrait;
use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class Slide extends Model
{
    use ImageableTrait, SortableTrait, ResourceableTrait, LogsActivity;

    protected $table = 'slides';

    protected $fillable = ['title', 'text', 'url', 'image'];

    protected static $logAttributes = ['title', 'text', 'url', 'image'];
}
