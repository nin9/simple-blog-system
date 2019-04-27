<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Flashy;
use App\Exceptions\InternalErrorException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Post\PostInterface;

class PostController extends Controller
{
    public $postRepo;

    public function __construct(PostInterface $postRepo){
        $this->postRepo = $postRepo;
    }

    public function index(){
        try{
            $posts = $this->postRepo->all();
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

            $errors = Validator::make($request->all(), [
                'title' => 'required|string',
                'body' => 'required|string',
                'category_id' => 'required|numeric|exists:categories,id',
                'image' => 'image|max:5000',
                ]);
            if ($errors->fails()) {
                $request->flash();
                return redirect()->route('Admin.AddPost')->withErrors($errors)->withInput($request->all());
            }

            $post = $this->postRepo->create($request->title, $request->body, $request->category_id, $request->image);

            Flashy::success('Post created successfully');
            return redirect()->route('PostView', $post->id);   
        }
        catch(\Exception $e){ throw $e;
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
            
            $errors = Validator::make($request->all(), [
                'title' => 'required|string',
                'body' => 'required|string',
                'category_id' => 'required|numeric|exists:categories,id',
                'image' => 'image|max:5000',
                ]);
            if ($errors->fails()) {
                $request->flash();
                return redirect()->route('Admin.EditPost', $id)->withErrors($errors)->withInput($request->all());
            }

            $post = $this->postRepo->update($id, $request->title, $request->body, $request->category_id, $request->image);

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
            $this->postRepo->delete($id);
            Flashy::success('Post deleted successfully');
            return redirect()->route('Admin.PostIndex');   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }
}
