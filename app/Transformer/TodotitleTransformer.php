<?php


namespace App\Transformer;

use App\Todotitle;
use League\Fractal\TransformerAbstract;

class TodotitleTransformer extends TransformerAbstract
{
    public function transform(Todotitle $todotitle){
        return [
            'id' => $todotitle->id,
            'title' => $todotitle->title,
        ];
    }

}