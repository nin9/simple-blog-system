<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        try{
            $categories = Category::all();
            return view('admin.categories.index', compact('categories'));
        }
        catch(\Exception $e){
            
        }
    }

    public function add(){
        try{
            return view('admin.categories.add');   
        }
        catch(\Exception $e){
        
        }
    }

    public function create(Request $request){
        try{
            $category = new Category();
            
            $category->name = $request->name;
            $category->save();

            return redirect()->route('Admin.CategoryIndex');   
        }
        catch(\Exception $e){
            
        }
    }
    
    public function edit($id){
        try{
            $category = Category::find($id);
            if(empty($category))
                return view('errors.404');
            return view('admin.categories.edit', compact('category'));   
        }
        catch(\Exception $e){
            return view('errors.404');
        }
    }

    public function update($id, Request $request){
        try{
            $category = Category::find($id);
            
            $category->name = $request->name;
            $category->update();

            return redirect()->route('Admin.CategoryIndex');   
        }
        catch(\Exception $e){
        
        }
    }

    public function delete($id){
        try{
            $category = Category::find($id);
            $category->posts()->delete();
            $category->delete();
            return redirect()->route('Admin.CategoryIndex');   
        }
        catch(\Exception $e){
        }
    }
}
