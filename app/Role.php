<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;


class Role extends Model
{
    protected $fillable = ['name'];
    protected $table = 'roles';

    protected static function boot()
    {
        parent::boot();
    }

    public function accounts()
    {
        return $this->belongsToMany('App\Account');
    }



}
