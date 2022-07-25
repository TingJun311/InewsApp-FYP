<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class NewsArticle extends Component
{
    public $link;

    public $data;
    public $query = [
        'url' => null,
    ];

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
                'X-RapidAPI-Host' => env('EXTRACT_HOST'),
                'X-RapidAPI-Key' => env('API_KEY'),
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
        
    }
}