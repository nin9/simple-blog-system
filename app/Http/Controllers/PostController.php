<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Repositories\Post\PostInterface;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Comment\CommentInterface;
use Flashy;

class PostController extends Controller
{
    public $postRepo;
    public $categoryRepo;
    public $commentRepo;

    public function __construct(PostInterface $postRepo, CategoryInterface $categoryRepo, CommentInterface $commentRepo){
        $this->postRepo = $postRepo;
        $this->categoryRepo = $categoryRepo;
        $this->commentRepo = $commentRepo;
    }

    public function index(){
        try{
            $posts = $this->postRepo->all();
            return view('posts.index', compact('posts'));
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }

    public function view($id){
        try{
            $post = $this->postRepo->find($id);
            if(empty($post))
                return view('errors.404');
            
            return view('posts.view', compact('post'));   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }
    
    public function indexByCategory($id){
        try{
            $category = $this->categoryRepo->find($id);
            if(empty($category))
                return view('errors.404');
            return view('posts.categoryIndex', compact('category'));    
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }

    public function addComment($id, Request $request){
        try{
            $post = $this->postRepo->find($id);
            $comment = $this->commentRepo->create($post->id, $request->body, $request->author_name, $request->author_email);
            return view('posts.view', compact('post'));
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }
}
