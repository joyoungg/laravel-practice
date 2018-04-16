<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['id','coName', 'coContent','own', 'hasChild'];
    protected $table = 'comments';

    protected static function boot()
    {
        parent::boot();
    }
}
