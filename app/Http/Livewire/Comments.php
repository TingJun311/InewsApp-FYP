<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Blog_comment;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $blogId, $blogComment, $userComment;

    protected $rules = [
        'userComment' => 'required',
    ];
    public function render()
    {
        return view('livewire.comments');
    }

    public function booted() {
        $this->blogComment = DB::table('blog_comments')
                                ->join('users', 'user_id', '=', 'users.id')
                                ->where('blog_id', '=', $this->blogId)
                                ->orderBy('blog_comments.created_at', 'desc')
                                // ->select('blog_comments*', 'users.name', 'users.profile_path')
                                ->get();
    }
    public function postComment () {
        if (Auth::check()) {
            $this->validate();

            $commenterName = User::where('id', auth()->id())->get();
            Blog_comment::create([
                'blog_id' => $this->blogId,
                'user_id' => auth()->id(),
                'commenter' => $commenterName[0]->name,
                'comment' => $this->userComment,
            ]);

            $this->booted();
            // return redirect()->to('/blogs');
        } else {
            return redirect('/signIn');
        }
    }
}
