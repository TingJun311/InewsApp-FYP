<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog_comment extends Model
{
    use HasFactory;

    protected $fillable = ['blog_id', 'user_id', 'commenter', 'comment'];

    public function blog () {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
}
