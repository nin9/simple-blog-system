<?php

namespace App\Repositories\Post;

use App\Exceptions\BadRequestException;
use App\Exceptions\InternalErrorException;
use App\Models\Post;
use App\Services\FileService;

class PostRepo implements PostInterface
{

    public function find($id){
        return Post::find($id);
    }

    public function all(){
        return Post::orderBy('created_at', 'DESC')->get();
    }

    public function create($title, $body, $category_id, $image=null){
        $post = new Post();

        if(!empty($image)){
            $image_url = FileService::saveFile($image, 'images');
            $post->image_url = $image_url;
        }

        $post->title = $title;
        $post->body = $body;
        $post->category_id = $category_id;
        $post->save();

        return $post;
    }

    public function update($id, $title, $body, $category_id, $image=null){
        $post = Post::find($id);

        if(!empty($image)){
            $image_url = FileService::saveFile($image, 'images');
            $post->image_url = $image_url;
        }

        $post->title = $title;
        $post->body = $body;
        $post->category_id = $category_id;
        $post->save();

        return $post;
    }

    public function delete($id)
    {
        $post = Post::find($id)->delete();
    }
}