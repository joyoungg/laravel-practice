<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    //use SoftDeletes;
    //public $timestamps = false;

    protected $fillable = ['content_id', 'comment_id', 'name', 'content'];
    protected $table = 'comments';

    protected static function boot()
    {
        parent::boot();
    }


}
