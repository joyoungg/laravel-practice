<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;


class Content extends Model
{
    use SoftDeletes;
    //public $timestamps = false;

    protected $fillable = ['title', 'name', 'content'];
    protected $table = 'content';
    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
