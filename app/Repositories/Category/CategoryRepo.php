<?php

namespace App\Repositories\Category;

use App\Exceptions\BadRequestException;
use App\Exceptions\InternalErrorException;
use App\Models\Category;

class CategoryRepo implements CategoryInterface
{

    public function find($id){
        return Category::find($id);
    }

    public function create($name){
        $category = new Category();

        $category->name = $name;
        $category->save();

        return $category;
    }

    public function update($id, $name){
        $category = Category::find($id);

        $category->name = $name;
        $category->save();

        return $category;
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->posts()->delete();
        $category->delete();
    }
}