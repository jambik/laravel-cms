<?php

namespace App;

use App\Traits\ResourceableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Photo extends Model
{
    use ResourceableTrait, LogsActivity;

    protected $table = 'photos';

    protected $fillable = ['name','image', 'img_url', 'order'];

    protected static $logAttributes = ['name', 'image', 'img_url', 'order'];

    public function photoable()
    {
        return $this->morphTo();
    }
}
