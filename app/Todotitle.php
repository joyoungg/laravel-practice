<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todotitle extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];
    protected $table = 'todotitles';
    protected $dates = ['created_at', 'updated_at','deleted_at'];

    public function todoitems()
    {
        return $this->hasMany('Todoitem');
    }

}
