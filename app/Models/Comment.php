<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    public function blog () {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
}