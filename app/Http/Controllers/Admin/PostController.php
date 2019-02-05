<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Flashy;
use App\Exceptions\InternalErrorException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

            $post = new Post();

            if(!empty($request->image)){
                $image_url = $this->saveFile($request->image, 'images');
                $post->image_url = $image_url;
            }

            $post->title = $request->title;
            $post->body = $request->body;
            $post->category_id = $request->category_id;
            $post->save();


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

            $post = Post::find($id);
            
            if(!empty($request->image)){
                $image_url = $this->saveFile($request->image, 'images');
                $post->image_url = $image_url;
            }

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

    private function saveFile($file, $folder=''){
        $file_name = $file->getClientOriginalName();
        
        if(Storage::disk('public')->put($folder.'/'.$file_name, file_get_contents($file)))
            return Storage::url($folder.'/'.$file_name);
    }
}
