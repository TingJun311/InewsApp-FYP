<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function viewBookmarks ($userId) {
        return view('users.bookmark', [
            'userId' => $userId,
            'bookmarks' => auth()->user()->bookmarks()->get(),
        ]);
    }
}
