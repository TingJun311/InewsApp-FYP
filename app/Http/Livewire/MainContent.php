<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class MainContent extends Component
{
    public $data;
    public $loadScreen = true;

    public $query = [
        'q' => 'coronavirus',
        'lang' => 'en',
        'page' => 1,
    ];

    public $pagination = [
        'next' => null,
        'previous' => null,
    ];

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render() {
        return view('livewire.main-content');
    }

    public function fetchNews() {
        $this->emit('refreshComponent');
        $response = Http::retry(3, 5000, function ($exception, $request) {
                        return $exception instanceof ConnectionException; 
                    })
            ->withHeaders([
                'X-RapidAPI-Host' => env('API_HOST'),
                'X-RapidAPI-Key' => env('API_KEY'),
            ])
            ->get('https://free-news.p.rapidapi.com/v1/search', $this->query);

        if ($response->failed()) {
            throw new \RuntimeException('Failed to convert', $response->status());
        };

        if ($response->clientError() || $response->serverError()) {
            return redirect('/');
        };

        if($response->successful()) {
            $this->data = $response->json();
            $this->loadScreen = false;
            $this->paginationController();
        };
    }

    public function setLoading () {
        $this->loadScreen = true;
    }
    
    public function nextPage() {
        $this->setLoading();
        $this->query['page']++;
        $this->fetchNews();
        $this->paginationController();
    }

    public function previousPage () {
        $this->setLoading();
        $this->query['page']--;
        $this->fetchNews();
        $this->paginationController();
    }

    private function paginationController () {
        $this->pagination['next'] = ($this->data['page'] != $this->data['total_pages'])? null : 'disabled';
        $this->pagination['previous'] = ($this->data['page'] == 1)? 'disabled' : null;
    }
}
