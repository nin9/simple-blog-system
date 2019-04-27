<?php

namespace App\Repositories\Post;

interface PostInterface
{
    public function find($id);
    public function all();
    public function create($title, $body, $category_id, $image=null);
    public function update($id, $title, $body, $category_id, $image=null);
    public function delete($id);
}