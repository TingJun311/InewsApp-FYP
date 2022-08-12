<?php
namespace App\Services;

class WeatherProvider {
    private string $host = 'weatherapi-com.p.rapidapi.com';
    private string $url = 'https://weatherapi-com.p.rapidapi.com/forecast.json';
    private RapidApiServices $rapidApiCalls;
    public function fetch (string $q, string $days, string $lang) {
        $this->rapidApiCalls = new RapidApiServices();

        try {
            $response = $this->rapidApiCalls->get(
                $this->host,
                $this->url,
                compact('q', 'days', 'lang')
            );
    
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            return back()->with('error', $e);
        }
    }
}