<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class SearchResult extends Component
{
    public $query, $page, $lang, $data;

    public function render()
    {
        return view('livewire.search-result');
    }

    public function getResult () {
        $query = [
            'q' => $this->query,
            'lang' => $this->lang,
            'page' => $this->page,
        ];

        $response = Http::retry(3, 5000, function ($exception, $request) {
                        return $exception instanceof ConnectionException; 
                    })
            ->withHeaders([
                'X-RapidAPI-Host' => env('API_HOST'),
                'X-RapidAPI-Key' => env('API_KEY'),
            ])
            ->get('https://free-news.p.rapidapi.com/v1/search', $query);

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
}
