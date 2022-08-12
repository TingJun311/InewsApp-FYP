<?php
namespace App\Services;

class FetchNewsServices {
    private string $host = 'free-news.p.rapidapi.com';
    private string $url = 'https://free-news.p.rapidapi.com/v1/search';

    public function __construct (protected RapidApiServices $rapidApiCalls) {}

    public function fetch (string $q, string $lang, string $page) {
        $response = $this->rapidApiCalls->get(
            $this->host, 
            $this->url, 
            compact('q', 'lang', 'page')
        );

        if ($response->failed()) {
            return redirect('/');
        }

        return $response->json();
    }
}