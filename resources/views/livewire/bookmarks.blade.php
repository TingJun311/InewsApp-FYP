<div>
    @php
        use Illuminate\Support\Str;
    @endphp

    <div id="bookmarkContainer" class="container mt-5" style="height: 100vh;">
        <h1>
            <strong>
                Bookmarks
            </strong>
        </h1>
        @unless (count($userBookmarks) == 0)
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach ($userBookmarks as $bookmark)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading{{ $bookmark->id }}">
                        <button 
                            class="accordion-button collapsed" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#flush-collapse{{ $bookmark->id }}" 
                            aria-expanded="false" 
                            aria-controls="flush-collapse{{ $bookmark->id }}"
                        >
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10">
                                        <div>
                                            {{ $bookmark->title }}
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 text-end">
                                        <span>
                                            {{ $bookmark->updated_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </button>
                        </h2>
                        <div id="flush-collapse{{ $bookmark->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $bookmark->id }}" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                {{ Str::limit($bookmark->description, 300, $end="...") }}
                                {{-- <code>.accordion-flush</code>  --}}
                                <div class="d-flex btnRow flex-row justify-content-between">
                                    <div class="p-2 viewBtn">
                                        <form action="/article/news" method="GET">
                                            <input type="hidden" name="url" value="{{ $bookmark->url }}">
                                            <button type="submit">
                                                <i class="fa-solid fa-book-open"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="p-2 delBtn">
                                        <button wire:loading.remove wire:click="$emit('deleteBookmark', {{ $bookmark->id }})">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
                @endforeach
            </div>
        @else
            <div class="d-flex justify-content-center mt-5">
                <p>You have 0 bookmarks</p>

            </div>
        @endunless
    </div>
</div>
