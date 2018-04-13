<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 2018-04-11
 * Time: 오후 6:05
 */

namespace App\Transformer;

use App\Content;
use League\Fractal\TransformerAbstract;

class ContentTransformer extends TransformerAbstract
{
    public function transform(Content $content){
        return [
            'id' => $content->id,
            'name' => $content->name,
            'title' => $content->title,
            'content' => $content->content,
        ];
    }

}