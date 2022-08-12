<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bookmark;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class NewsArticle extends Component
{
    public $link, $isBookmarked;

    public $data;
    public $query = [
        'url' => null,
    ];
    
    public function booted () {
        $this->isBookmarked = false;
        $bookmark = DB::table('bookmarks')
                        ->where('user_id', '=', auth()->id(), 'AND', 'url', '=', $this->link)
                        ->count();
        
        if ($bookmark == 1) {
            $this->isBookmarked = true;
        }
    }
    public function render() {
        // This method its to render the component
        return view('livewire.news-article');
    }

    public function getArticles () {
        $this->query['url'] = $this->link;
        $response = Http::retry(3, 5000, function ($exception, $request) {
                return $exception instanceof ConnectionException; 
            })
            ->withHeaders([
                'X-RapidAPI-Host' => config('app.rapid_api_host.extract_news'),
                'X-RapidAPI-Key' => config('app.rapid_api_key'),
            ])
            ->get('https://extract-news.p.rapidapi.com/v0/article', $this->query);

        if ($response->failed()) {
            throw new \RuntimeException('Failed to convert', $response->status());
        };

        if ($response->clientError() || $response->serverError()) {
            return redirect('/');
        };

        if($response->successful()) {
            $this->data = $response->json();
        };
    }

    public function bookmark () {

        Bookmark::create([
            'user_id' => auth()->id(),
            'author' => (empty($this->data['article']['authors'][0]))? null : $this->data['article']['authors'][0] ,
            'title' => $this->data['article']['title'],
            'description' => $this->data['article']['text'],
            'url' => $this->link,
            'urlToImage' => $this->data['article']['top_image'],
        ]);

        $this->booted();
    }
}
