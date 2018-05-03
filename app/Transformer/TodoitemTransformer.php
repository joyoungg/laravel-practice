<?php


namespace App\Transformer;

use App\Todoitem;
use League\Fractal\TransformerAbstract;

class TodoitemTransformer extends TransformerAbstract
{
    public function transform(Todoitem $todoitem)
    {
        return [
            'id' => $todoitem->id,
            'title_id' => $todoitem->title_id,
            'content' => $todoitem->content,
            'status' => $todoitem->status,
        ];
    }

}