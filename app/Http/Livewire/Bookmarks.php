<?php

namespace App\Http\Livewire;

use App\Models\Bookmark;
use Livewire\Component;

class Bookmarks extends Component
{
    public $userBookmarks, $bookmarkId;

    protected $listeners = [ 'deleteBookmark' ];

    public function render()
    {
        return view('livewire.bookmarks');
    }

    public function boot () {
        $this->userBookmarks = Bookmark::where('user_id', auth()->id())->get();
    }

    public function deleteBookmark ($id) {
        $this->bookmarkId = Bookmark::where('id', $id)->delete();
        $this->boot();
    }
}
