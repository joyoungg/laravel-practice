<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;


class Manager extends Model
{
    protected $fillable = ['student_id', 'subject_id'];
    protected $table = 'mamngers';

    protected static function boot()
    {
        parent::boot();
    }

    public function content()
    {
        return $this->belongsTo('App\Content');
    }
}
