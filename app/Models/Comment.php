<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'author_name', 'author_email'];
    
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
