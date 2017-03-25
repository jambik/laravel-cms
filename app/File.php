<?php

namespace App;

use App\Traits\FileableTrait;
use App\Traits\ResourceableTrait;
use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class File extends Model
{
    use SortableTrait, FileableTrait, ResourceableTrait, LogsActivity;

    protected $table = 'files';

    protected $fillable = ['name', 'description', 'file'];

    protected static $logAttributes = ['name', 'description', 'file'];

    protected $appends = ['file_url'];
}