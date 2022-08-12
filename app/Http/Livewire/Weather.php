<?php

namespace App\Http\Livewire;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Services\WeatherProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Client\ConnectionException;

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
        'userInput.required' => 'You are not entering a valid city or location'
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

    public function getWeather (WeatherProvider $weatherProvider) {

        if ($this->validatedInput != null) {
            $this->query['q'] = $this->validatedInput;
            $this->validatedInput = null;
        }

            $this->weatherData = $weatherProvider->fetch(
                $this->query['q'],
                $this->query['days'],
                $this->query['lang']
            );
    }

    public function getInputWeather () {
        $this->validate(); // If this validation not passed it wont go to the new line of code 
        
        $this->validatedInput = $this->userInput;
        $this->userInput = null;
        $weatherProvider = new WeatherProvider();
        $this->getWeather($weatherProvider);
    }
}

