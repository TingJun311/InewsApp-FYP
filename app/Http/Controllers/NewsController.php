<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class NewsController extends Controller
{
    public function showNews (Request $request) {
        return view('news.article', [
            'link' => $request->link,
        ]);
    }
}
