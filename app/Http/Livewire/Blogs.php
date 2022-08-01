<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Blogs extends Component
{
    public $blogs, $comments;
    public function render()
    {
        return view('livewire.blogs');
    }

    public function getBlogs () {
        $this->blogs = DB::table('blogs')->latest()->get();
    }
}
