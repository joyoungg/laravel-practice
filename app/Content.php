<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;


class Content extends Model
{
    //use SoftDeletes;
    //public $timestamps = false;

    protected $fillable = ['title', 'name', 'content'];
    protected $table = 'content';

    protected static function boot()
    {
        parent::boot();
    }


}
