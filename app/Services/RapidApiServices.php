<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class RapidApiServices {

    public function get (string $host, string $url, array $params) {
        return Http::retry(3, 5000, function ($exception, $request) {
                        return $exception instanceof ConnectionException; 
                    })
            ->withHeaders([
                'X-RapidAPI-Host' => $host,
                'X-RapidAPI-Key' => config('app.rapid_api_key'),
            ])
            ->get($url, $params);
    }
}
