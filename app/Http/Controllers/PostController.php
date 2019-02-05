<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Flashy;

class PostController extends Controller
{
    public function index(){
        try{
            $posts = Post::orderBy('created_at', 'DESC')->get();
            return view('posts.index', compact('posts'));
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }

    public function view($id){
        try{
            $post = Post::find($id);
            if(empty($post))
                //return view('errors.404');
            throw new Exception("Error Processing Request");
            
            return view('posts.view', compact('post'));   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
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
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }
}
