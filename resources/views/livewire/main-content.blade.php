<div wire:init="fetchNews">
    @php
        use Illuminate\Support\Str;
    @endphp
    <div wire:loading style="width: 100%">
        <div class="text-center" id="pageLoad">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    @if ($loadScreen)
        <p>...</p>
    @else

        <div wire:loading.remove>
            <div class="container-fiuld">
                <div class="row">
                    <div class="col-12 col-xxl-2">
                        <livewire:side-nav :userInput="$data['user_input']"/>
                    </div>
                    <div class="col-12 col-xxl-7">
                        @unless ($data['status'] !== 'ok')
                            @php
                                $articles = $data['articles'];
                            @endphp
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6 card border border-0 text-white">
                                        <img src="{{ $articles[0]['media'] }}" class="card-img border border-0 img-fluid bannerImage" alt="..." style="height: 100%; object-fit: cover;">
                                        <div class="card-img-overlay">
                                            <h5 class="card-title">{{ $articles[0]['title'] }}</h5>
                                            <p class="card-text">
                                                {{ Str::limit($articles[0]['summary'], 100, $end = '....') }}
                                            </p>
                                            <p class="card-text">Last updated 3 mins ago</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <div class="card border border-0">
                                                <img src="{{ $articles[1]['media'] }}" class="card-img border border-0" alt="...">
                                                <div class="card-img-overlay">
                                                    <h5 class="card-title">{{ $articles[1]['title'] }}</h5>
                                                    <p class="card-text">
                                                        {{ Str::limit($articles[1]['summary'], 50, $end = '....') }}
                                                    </p>
                                                    <p class="card-text">Last updated 3 mins ago</p>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="card border border-0">
                                                <img src="{{ $articles[2]['media'] }}" class="card-img border border-0" alt="...">
                                                    <div class="card-img-overlay">
                                                        <h5 class="card-title">{{ $articles[2]['title'] }}</h5>
                                                        <p class="card-text">
                                                            {{ Str::limit($articles[2]['summary'], 30, $end = '....') }}
                                                        </p>
                                                        <p class="card-text">Last updated 3 mins ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card border border-0">
                                                    <img src="{{ $articles[3]['media'] }}" class="card-img border border-0 " alt="...">
                                                    <div class="card-img-overlay">
                                                        <h5 class="card-title">{{ $articles[3]['title'] }}</h5>
                                                        <p class="card-text">
                                                            {{ Str::limit($articles[3]['summary'], 30, $end = '....') }}
                                                        </p>
                                                        <p class="card-text">Last updated 3 mins ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @for ($i = 4; $i < count($articles); $i++)
                                <div class="card mb-3  border border-0" style="max-width: 900px;">
                                    <div class="row g-0">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <form action="/news/articles" method="post">
                                                    @csrf
                                                    <input type="hidden" name="link" value="{{ $articles[$i]['link'] }}">
                                                    <button type="submit" class="card-title">
                                                        {{ $articles[$i]['title'] }}
                                                    </button>
                                                </form>
                                                <p class="card-text">
                                                    {{ Str::limit($articles[$i]['summary'], 200, $end = '....') }}
                                                </p>
                                                <p class="card-text">
                                                    <small class="text-muted">
                                                        {{ $articles[$i]['published_date'] }}
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            {{-- @foreach ($data['articles'] as $article)
                                <div class="card mb-3  border border-0" style="max-width: 900px;">
                                    <div class="row g-0">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{ $article['title'] }}
                                                </h5>
                                                <p class="card-text">
                                                    {{ Str::limit($article['summary'], 200, $end = '....') }}
                                                </p>
                                                <p class="card-text">
                                                    <small class="text-muted">
                                                        {{ $article['published_date'] }}
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach --}}


                            <div wire:loading.attr="disabled">
                                <ul class="pagination flex-row justify-content-center">
                                    <li class="page-item {{ $pagination['previous'] }}">
                                        <button class="page-link" wire:click="previousPage">Previous</button>
                                    </li>
                                    <li class="page-item active" aria-current="page">
                                        <button class="page-link">{{ $data['user_input']['page'] }}</button>
                                    </li>
                                    <li class="page-item {{ $pagination['next'] }}">
                                        <button class="page-link" wire:click="nextPage">Next</button>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <div class="d-flex justify-content-center">
                                <h3>Try again later</h3>
                            </div>
                        @endunless
                    </div>
                    <div class="col-12 col-xxl-3">
                        <livewire:weather />
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
