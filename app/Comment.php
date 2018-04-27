<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use SoftDeletes;

    //public $timestamps = false;

//    protected $fillable = ['content_id', 'comment_id', 'name', 'content'];
    protected $fillable = ['content_id', 'name', 'content'];
    protected $table = 'comments';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();
    }

    public function content()
    {
        return $this->belongsTo('App\Content');
    }
}
