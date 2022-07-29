{{-- <img src="{{ $weatherData['current']['condition']['icon']  }}" alt=""> --}}
<div wire:init="getWeather">
    @php
        use Carbon\Carbon;

        function dateFormat ($date, $format) {
            return Carbon::createFromFormat('Y-m-d', $date)->format($format);
        }
    @endphp
    @if ($weatherData != null)
        {{-- @unless ($weather)
            
        @endunless --}}
        <div class="container">
            <div class="row">
                <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    {{ $weatherData['location']['region'] }}
                </button>
                <div class="collapse mt-1" id="collapseExample">
                    <div class="card card-body">
                        <a href="https://whatismyipaddress.com/">Get your current Ip address</a>
                        <input type="text" name="userInput" wire:model.lazy="userInput" placeholder="Enter City or Ip address">
                        <button wire:click="getInputWeather">
                            Enter
                        </button>
                    </div>
                </div>
                    @error('userInput')
                        <p>{{ $message }}</p>
                    @enderror
            </div>
            <div class="row">
                <div class="d-flex flex-row justify-content-start">
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
    @else
        <p>Laoding...</p>
    @endif

    <div wire:loading>
        <p>Please wait....</p>
    </div>
    <style>
        .weatherDiv {
            font-size: 1rem;
        }
        .weatherDiv img {
            width: 70%;
        }
    </style>
</div>
