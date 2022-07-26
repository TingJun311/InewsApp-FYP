<div wire:init="getResult">
    @php
        use Illuminate\Support\Str;
    @endphp
    <div wire:loading style="width: 100%; height: 100vh;">
        <x-laodingScreen />
    </div>
    @if ($loading)
        <p></p>
    @else
        <div wire:loading.remove>
            <div class="container-fiuld mainBx mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-xxl-2">
                        <livewire:side-nav :userInput="$data['user_input']"/>
                    </div>
                    <div class="col-12 col-xxl-6 mt-2">
                        @unless ($data['status'] !== 'ok')
                            @php
                                $articles = $data['articles'];
                            @endphp
                            @foreach ($data['articles'] as $article)
                                <form method="GET" action="/news/articles" class="container-fiuld m-2">
                                    {{-- {{ dd($article) }} --}}
                                    @csrf
                                    <div class="row">
                                        <div class="col-4 p-3 align-items-center">
                                            <img src="{{ $article['media'] }}" alt="" class="img-fluid rounded float-end shadow-sm bg-body">
                                        </div>
                                        <div class="col-8 p-3 cardBox">
                                            <h5 class="cardTitle text-start">
                                                <button type="submit" class="text-start">
                                                    {{ $article['title'] }}
                                                </button>
                                            </h5>
                                            <div class="d-flex flex-row">
                                                <input type="hidden" name="link" value="{{ $article['link'] }}">
                                                <div class="pe-1" id="author">{{ $article['author'] }}</div>
                                                <div class="ps-1" id="date">{{ $article['published_date'] }}</div>
                                            </div>
                                            <p class="py-1">
                                                {{ Str::limit($article['summary'], 90, $end = '....') }}
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        @else
                            <div class="d-flex justify-content-center">
                                <h3>Try again later</h3>
                            </div>
                        @endunless
                    </div>
                    <div class="col-12 col-xxl-2 align-items-center mt-3">
                        <livewire:weather />
                    </div>
                </div>
            </div>
            <livewire:pagination 
                :query="$data['user_input']['q']" 
                :lang="$data['user_input']['lang']" 
                :page="$data['user_input']['page']" 
                :totalPage="$data['total_pages']" />
        </div>
    @endif
</div>
