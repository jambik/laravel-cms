<?php

namespace App;

use App\Traits\ResourceableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Block extends Model
{
    use ResourceableTrait, LogsActivity;

    protected $table = 'blocks';

    protected $fillable = ['alias', 'title', 'text'];

    protected static $logAttributes = ['alias', 'title', 'text'];
}
