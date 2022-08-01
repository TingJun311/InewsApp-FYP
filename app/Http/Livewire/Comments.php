<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $blogId, $blogComment, $userComment;

    protected $rules = [
        'userComment' => 'require',
    ];
    public function render()
    {
        return view('livewire.comments');
    }

    public function getComments () {
        $this->blogComment = DB::table('blog_comments')->latest()->get();
    }

    public function postComment () {
        if (Auth::check()) {
            $this->validate();

            Comment::create([
                'blog_id' => $this->blogId,
                'user_id' => auth()->id(),
                // 'commenter' => User::find()
                'comment' => $this->userComment,
            ]);

        } else {
            return redirect('/signIn');
        }
    }
}
