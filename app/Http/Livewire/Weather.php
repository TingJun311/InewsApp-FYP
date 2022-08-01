<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Client\ConnectionException;
use Carbon\Carbon;
use Throwable;

class Weather extends Component
{
    public $weatherData, $user, $userInput;
    public $ip;
    public $days;
    public $query;

    public $validatedInput;
    protected $rules = [
        'userInput' => 'required',
    ];
    protected $messages = [
        'userInput.required' => 'Input field required'
    ];

    protected $listeners = ['weatherInput' => 'getInputWeather'];

    public function render() {
        return view('livewire.weather');
    }
    public function booted () {
        // $this->ip = request()->ip();
        $this->ip = (array)Location::get(env('IP'));
        if (Auth::check()) {
            $this->user = User::find(auth()->id());
        } 

        $this->query['q'] =  $this->ip['regionName'];
        $this->query['days'] = 3;
        $this->query['lang'] = ($this->user)? $this->user->lang : 'en';

    }

    public function getWeather () {

        if ($this->validatedInput != null) {
            $this->query['q'] = $this->validatedInput;
            $this->validatedInput = null;
        }

        // try {
            $response = Http::retry(3, 5000, function ($exception, $request) {
                    return $exception instanceof ConnectionException; 
                })
                ->withHeaders([
                    'X-RapidAPI-Host' => env('WEATHER_HOST'),
                    'X-RapidAPI-Key' => env('API_KEY'),
                ])
                ->get('https://weatherapi-com.p.rapidapi.com/forecast.json', $this->query);
    
            if ($response->failed()) {
                $response->throw();
            };
    
            if ($response->clientError() || $response->serverError()) {
                $response->throw();
            };
    
            if($response->successful()) {
                $this->weatherData = $response->json();
            };

        // } catch (Throwable $e) {
        //     $this->booted();
        // }
    }

    public function getInputWeather () {
        $this->validate(); // If this validation not passed it wont go to the new line of code 
        
        $this->validatedInput = $this->userInput;
        $this->userInput = null;
        $this->getWeather();
    }
}

