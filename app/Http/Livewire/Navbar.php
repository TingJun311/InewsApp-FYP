<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $userData, $userBookmarkCount;
    public function render()
    {
        return view('livewire.navbar');
    }

    public function boot () {
        if (Auth::check()) {
            // The user is logged in...
            $this->userData = User::find(auth()->id());
            $this->userBookmarkCount = auth()->user()->bookmarks()->get();
        }
    }
}
