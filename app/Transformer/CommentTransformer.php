<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 2018-04-11
 * Time: 오후 6:05
 */

namespace App\Transformer;

use App\Comment;
use League\Fractal\TransformerAbstract;

class CommentTransformer extends TransformerAbstract
{
    public function transform(Comment $comment)
    {
        return [
            'id' => $comment->id,
            'content_id' => $comment->content_id,
            'conmment_id' => $comment->comment_id,
            'name' => $comment->name,
            'content' => $comment->content,
        ];
    }
}