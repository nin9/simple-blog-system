<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(){
        try{
            $posts = Post::all();
            return view('posts.index', compact('posts'));
        }
        catch(\Exception $e){
            
        }
    }

    public function view($id){
        try{
            $post = Post::find($id);
            if(empty($post))
                return view('errors.404');
            return view('posts.view', compact('post'));   
        }
        catch(\Exception $e){
            
        }
    }
    
    public function indexByCategory($id){
        try{
            $category = Category::find($id);
            if(empty($category))
                return view('errors.404');
            return view('posts.categoryIndex', compact('category'));    
        }
        catch(\Exception $e){

        }
    }
}
