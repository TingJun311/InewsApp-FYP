
<div wire:init="getWeather">
    @php
        use Carbon\Carbon;

        function dateFormat ($date, $format) {
            return Carbon::createFromFormat('Y-m-d', $date)->format($format);
        }
    @endphp
    @if ($weatherData != null)
        <div class="container" id="weatherContainer" wire:loading.remove>
            <div class="row">
                <button class="weatherButton" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    {{ $weatherData['location']['region'] }} <i class="fa-solid fa-angle-down"></i>
                </button>
                <div class="collapse mt-1" id="collapseExample">
                    <div class="card card-body shadow p-3 mb-5 bg-body rounded">
                        <a href="https://whatismyipaddress.com/" id="ipLink">Get your current location</a>
                        <input 
                            id="weatherInput"
                            type="text" 
                            name="userInput" 
                            wire:model.lazy="userInput" 
                            placeholder="Enter City or Ip address">
                        <button wire:click="getInputWeather" class="weatherButton">
                            Enter
                        </button>
                    </div>
                </div>
                    @error('userInput')
                        <p id="errorMessage">{{ $message }}</p>
                    @enderror
            </div>
            <div class="row">
                <div class="d-flex flex-row justify-content-between">
                    @foreach ($weatherData['forecast']['forecastday'] as $day)
                        <div class="p-2 text-center weatherDiv">
                            <img src="{{ $day['day']['condition']['icon'] }}" alt="">
                            <p>{{ dateFormat($day['date'], 'm-d') }}</p>
                            <p>{{ (date('Y-m-d') == $day['date'])? 'Today' : dateFormat($day['date'], 'D') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div wire:loading.block >
        <a href="#" tabindex="-1" id="loadingBtn" class="disabled placeholder col-11" aria-hidden="true"></a>
        <p class="card-text placeholder-glow">
            <span class="placeholder col-7"></span>
            <span class="placeholder col-4"></span>
            <span class="placeholder col-4"></span>
            <span class="placeholder col-6"></span>
            <span class="placeholder col-8"></span>
        </p>
        <p class="card-text placeholder-glow">
            <span class="placeholder col-7"></span>
            <span class="placeholder col-5"></span>
            <span class="placeholder col-4"></span> 
        </p>
    </div>
    <style>
        span#errorMessage {
            color: red;
            font-size: 11px
        }

        #loadingBtn {
            border: none;
            margin: 6px;
            background: #5138ee;    
            color: #fff;
            padding: 0.3rem;
            border-radius: 30px
        }
        .weatherDiv {
            font-size: 1rem;
        }
        .weatherDiv img {
            width: 70%;
        }
        #weatherContainer .card {
            border: none;
        }

        #ipLink {
            text-decoration: none;
        }
        #ipLink:hover {
            text-decoration-line: underline;
            text-decoration-thickness: 3px;
        }

        #weatherInput {
            border: 2px solid #d6d6d6;
            border-radius: 50px;
            transition: linear 0.2s;
            box-sizing: border-box;
            margin: 0.3rem;
            padding: 0.6rem;
        }
        #weatherInput:focus {
            outline: none;
            border: 2px solid #5138ee;
            transition: linear 0.2s;
        }
        .weatherButton {
            border: none;
            margin: 6px;
            background: #5138ee;    
            color: #fff;
            padding: 0.2rem;
            border-radius: 30px;
            transition: linear 0.2s;
        }
        .weatherButton:hover {
            background: #1f0098;
            transition: linear 0.2s; 
        }
    </style>
</div>
