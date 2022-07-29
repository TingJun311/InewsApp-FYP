<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

use function GuzzleHttp\Promise\all;

class NewsController extends Controller
{
    public function showNews (Request $request) {
        return view('news.article', [
            'link' => $request->link,
        ]);
    }

    public function viewNews (Request $request) {
        return view('news.article', [
            'link' => $request['url'],
        ]);
    }

    public function showResult (Request $request) {
        return view('news.search', [
            'query' => $request['query'],
            'page' =>  $request['page'],
            'lang' =>  $request['lang'],
        ]);
    }
}
