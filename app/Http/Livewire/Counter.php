<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class Counter extends Component
{
    public $counter = 0;
    public string $data;
    public function render()
    {
        return view('livewire.counter');
    }

    public function increment() {
        $this->counter++;
    }

    public function decrement() {
        $this->counter--;
    }
    public function boot() {
        $data = [
            'q' => 'latest',
            'lang' => 'en',
            'page' => '1',
        ];
        $response = Http::retry(3, 5000, function ($exception, $request) {
                        return $exception instanceof ConnectionException; })
            ->withHeaders([
                'X-RapidAPI-Host' => env('API_HOST'),
                'X-RapidAPI-Key' => env('API_KEY'),
            ])
            ->get('https://free-news.p.rapidapi.com/v1/search', $data);

        if ($response->failed()) {
            throw new \RuntimeException('Failed to convert', $response->status());
        };

        if ($response->clientError() || $response->serverError()) {
            return redirect('/');
        };

        if($response->successful()) {
            $this->data = $response->body();
        };
    }
}
