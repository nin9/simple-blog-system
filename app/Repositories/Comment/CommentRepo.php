<?php

namespace App\Repositories\Comment;

use App\Exceptions\BadRequestException;
use App\Exceptions\InternalErrorException;
use App\Models\Comment;

class CommentRepo implements CommentInterface
{

    public function find($id){
        return Comment::find($id);
    }

    public function create($post_id, $body, $author_name, $author_email){
        $comment = new Comment();

        $comment->post_id = $post_id;
        $comment->body = $body;
        $comment->author_name = $author_name;
        $comment->author_email = $author_email;
        $comment->save();

        return $comment;
    }
}