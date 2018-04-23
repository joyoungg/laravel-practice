<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;


class Account extends Model
{
    protected $fillable = ['name'];
    protected $table = 'accounts';

    protected static function boot()
    {
        parent::boot();
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

}
