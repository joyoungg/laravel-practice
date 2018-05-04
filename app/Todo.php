<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'status'];
    protected $table = 'todos';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
