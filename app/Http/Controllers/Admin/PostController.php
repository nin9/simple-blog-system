<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Flashy;

class PostController extends Controller
{
    public function index(){
        try{
            $posts = Post::all();
            return view('admin.posts.index', compact('posts'));
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }

    public function add(){
        try{
            return view('admin.posts.add');   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }   
    }

    public function create(Request $request){
        try{
            $post = new Post();
            
            $post->title = $request->title;
            $post->body = $request->body;
            $post->category_id = $request->category_id;
            $post->save();
            Flashy::success('Post created successfully');
            return redirect()->route('PostView', $post->id);   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }
    
    public function edit($id){
        try{
            $post = Post::find($id);
            if(empty($post))
                return view('errors.404');
            return view('admin.posts.edit', compact('post'));   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }

    public function update($id, Request $request){
        try{
            $post = Post::find($id);
            
            $post->title = $request->title;
            $post->body = $request->body;
            $post->category_id = $request->category_id;
            $post->update();
            Flashy::success('Post updated successfully');
            return redirect()->route('PostView', $id);   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }

    public function delete($id){
        try{
            $post = Post::find($id)->delete();
            Flashy::success('Post deleted successfully');
            return redirect()->route('Admin.PostIndex');   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }
}
