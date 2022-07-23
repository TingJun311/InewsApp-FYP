<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'author', 'title', 'description', 'url', 'urlToImage'];
    
    // Relationship to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
