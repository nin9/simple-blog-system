<?php

namespace App\Repositories\Category;

interface CategoryInterface
{
    public function find($id);
    public function create($name);
    public function update($id, $name);
    public function delete($id);
}