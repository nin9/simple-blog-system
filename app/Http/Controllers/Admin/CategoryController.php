<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Flashy;

class CategoryController extends Controller
{
    public function index(){
        try{
            $admin_categories = Category::all();
            return view('admin.categories.index', compact('admin_categories'));
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }

    public function add(){
        try{
            return view('admin.categories.add');   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }

    public function create(Request $request){
        try{
            $category = new Category();
            
            $category->name = $request->name;
            $category->save();

            Flashy::success('Category created successfully');
            return redirect()->route('Admin.CategoryIndex');   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
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
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }

    public function update($id, Request $request){
        try{
            $category = Category::find($id);
            
            $category->name = $request->name;
            $category->update();

            Flashy::success('Category updated successfully.');
            return redirect()->route('Admin.CategoryIndex');   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }

    public function delete($id){
        try{
            $category = Category::find($id);
            $category->posts()->delete();
            $category->delete();

            Flashy::success('Category deleted successfully');
            return redirect()->route('Admin.CategoryIndex');   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }
}
