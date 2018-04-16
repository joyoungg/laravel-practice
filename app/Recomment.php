<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recomment extends Model
{
    protected $fillable = ['reco_name', 'reco_content', 'co_number'];
    protected $table = 'recoComments';

    protected static function boot()
    {
        parent::boot();
    }

}
