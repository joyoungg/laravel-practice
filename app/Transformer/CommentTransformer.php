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
            'own' => $comment->own,
            'coName' => $comment->coName,
            'coContent' => $comment->coContent,
        ];
    }
}