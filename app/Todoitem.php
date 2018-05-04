<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todoitem extends Model
{
    use SoftDeletes;

    protected $fillable = ['title_id', 'title', 'content', 'status'];
    protected $table = 'todoitems';
    protected $dates = ['created_at', 'updated_at','deleted_at'];

    public function todotitles()
    {
        return $this->belongsTo('App\Todotitle','title_id');
    }
}