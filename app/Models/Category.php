<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function category(){
        return $this->hasMany(Post::class);
    }
}
