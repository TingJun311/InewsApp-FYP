<div wire:init="getResult">
    <div wire:loading wire:target="getResult" wire:loading.class="loadingScreen">
        <div class="text-center loadingScreen">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    @unless ($data == null)
        {{-- {{ dd($data) }} --}}
        @if ($data['status'] == 'ok')
            <div class="d-flex align-content-around justify-content-evenly flex-wrap">
                @foreach ($data['articles'] as $article)
                    <div class="p-2">
                        <div class="card">
                            <img src="{{ $article['media'] }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article['title'] }}</h5>
                                <p class="card-text">
                                    {{ $article['summary'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
        @endif
    @endunless        
</div>
