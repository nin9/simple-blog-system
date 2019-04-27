<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Flashy;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Category\CategoryInterface;

class CategoryController extends Controller
{

    public $categoryRepo;

    public function __construct(CategoryInterface $categoryRepo){
        $this->categoryRepo = $categoryRepo;
    }

    public function index(){
        try{
            return view('admin.categories.index');
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
            $errors = Validator::make($request->all(), [
                'name' => 'required|string|unique:categories'
            ]);
            if ($errors->fails()) {
                $request->flash();
                return redirect()->route('Admin.AddCategory')->withErrors($errors)->withInput($request->all());
            }
            
            $category = $this->categoryRepo->create($request->name);

            Flashy::success('Category created successfully');
            return redirect()->route('Admin.CategoryIndex');   
        }
        catch(\Exception $e){
            throw $e;
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }
    
    public function edit($id){
        try{
            $category =  $this->categoryRepo->find($id);
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

            $errors = Validator::make($request->all(), [
                'name' => 'required|string'
            ]);
            if ($errors->fails()) {
                $request->flash();
                return redirect()->route('Admin.EditCategory', $id)->withErrors($errors)->withInput($request->all());
            }

            $category = $this->categoryRepo->update($id, $request->name);

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
            $this->categoryRepo->delete($id);
            Flashy::success('Category deleted successfully');
            return redirect()->route('Admin.CategoryIndex');   
        }
        catch(\Exception $e){
            Flashy::error('An Error Occurred !');
            return redirect()->back();
        }
    }
}
