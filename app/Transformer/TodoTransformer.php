<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 2018-04-11
 * Time: 오후 6:05
 */

namespace App\Transformer;

use App\Todo;
use League\Fractal\TransformerAbstract;

class TodoTransformer extends TransformerAbstract
{
    public function transform(Todo $todo)
    {
            return [
                'id' => $todo->id,
                'title' => $todo->title,
                'content' => $todo->ex,
                'status' => $todo->status,
            ];

    }
}