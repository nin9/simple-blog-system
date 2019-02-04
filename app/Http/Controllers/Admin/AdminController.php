<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Flashy;

class AdminController extends Controller
{
    public function dashboard(){
        try{
            $post_count = Post::all()->count();
            $category_count = Category::all()->count();
            return view('admin.dashboard', compact('post_count', 'category_count'));
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }
}
