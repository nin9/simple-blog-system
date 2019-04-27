<?php

namespace App\Repositories\Comment;

interface CommentInterface
{
    public function find($id);
    public function create($post_id, $body, $author_name, $author_email);
}