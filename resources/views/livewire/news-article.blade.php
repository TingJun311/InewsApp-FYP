<div wire:init="getArticles">
    @php
        use Illuminate\Support\Str;
        $whiteSpace = '\n';
    @endphp
    <div wire:loading wire:target="getArticles" wire:loading.class="loadingScreen">
        <x-laodingScreen />
    </div>


    @unless ($data == null)
        @if ($data['status'] == 'ok')
            <head>
                <meta name="description" content="{{ $data['article']['meta_description'] }}">
                @if (!empty($data['article']['meta_keywords'][0]))
                    <meta name="keywords" content="{{ $data['article']['meta_keywords'][0] }}">    
                @endif
                @if (!empty($data['article']['authors'][0]))
                    <meta name="author" content="{{ $data['article']['authors'][0] }}">    
                @endif
            </head>
            <div id="background" class="text-center overflow-hidden">
                <img 
                    src="{{ $data['article']['top_image'] }}" 
                    alt="{{ $data['article']['title'] }}" 
                    data-source="{{ $data['article']['source_url'] }}" 
                    class="img-fluid " 
                    id="myImg"
                    onclick="viewImage()"
                    >
            </div>
            <br>

            <div class="container">
                <div class="row">
                    <div class="col-10">
                        <h2 class="m-5 float-start" >
                            <strong>
                                {{ $data['article']['title'] }}
                            </strong>
                        </h2>
                    </div>
                    <div class="col-2 d-flex align-items-center text-center justify-content-center">
                        @auth
                            @if ($isBookmarked == true)
                                <i class="fa-solid fa-check"></i>
                            @else 
                                <button wire:click="bookmark" wire:loading.remove>
                                    <i class="fa-regular fa-bookmark icon"></i>
                                </button>
                            @endif
                        @else
                            <!-- Button trigger modal -->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-regular fa-bookmark icon"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-4 shadow">
                                    <div class="modal-header border-bottom-0">
                                        <h5 class="modal-title">Bookmark?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body py-0">
                                        <h5>Sign in to bookmark!</h5>
                                    </div>
                                        <div class="modal-footer flex-column border-top-0">
                                            <a href="/signIn" class="btn btn-lg w-100 mx-0 mb-2">Sign In</a>
                                            <button type="button" class="btn btn-lg btn-light w-100 mx-0" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endauth
                        <div wire:loading wire:target="bookmark">
                            <div class="text-center" style="width: 100%">
                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="line"></div> --}}
            </div>
            <div class="container py-5">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-lg-3 col-12 px-1">
                        <div class="sticky-top">
                            <br>
                            <br>
                            <div class="d-flex flex-column shadow-sm p-3 mb-5 bg-body rounded descriptionBx" >
                                <div class="my-2">
                                    <h5>Description</h5>
                                    <p class="metaData">
                                        {{ empty($data['article']['meta_description'])? 'No descriptions found.' :  $data['article']['meta_description']}}
                                    </p>
                                </div>
                                <div class="d-flex flex-lg-column flex-sm-row justify-content-sm-between flex-column">
                                    <div class="my-2">
                                        <h6>Author</h6>
                                        <p class="metaData">
                                            {{ (empty($data['article']['authors']))? 'No author found' : $data['article']['authors'][0] }}
                                        </p>
                                    </div>
                                    <div class="my-2">
                                        <h6>Published date</h6>
                                        <p class="metaData">
                                            {{ empty($data['article']['published'])? 'No date found.' : $data['article']['published'] }}
                                        </p>
                                    </div>
                                    <div class="my-2">
                                        <h6>Read more</h6>
                                        <a href="{{ $link }}" id="linkTag">
                                            {{ empty($data['article']['source_url'])? Str::limit($link, 20, $end="...") : $data['article']['source_url'] }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-11 ms-3">
                        <br>
                        <br>
                        <div class="d-flex flex-row justify-content-center shadow-none p-3 mb-5 bg-light rounded descriptionBx">
                            <div class="p-5 m-2">
                                <div class="ms-3">
                                    <h4>Summary</h4>
                                </div>
                                @php
                                    $split = explode("\n", $data['article']['text']);
                                @endphp
                                {{-- {{ dd($data['article']['text']) }} --}}
                                <div>
                                    <ul>
                                        @foreach ($split as $item)
                                            @if ($item != null)
                                                <li>{{ $item }}</li>
                                                <br>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>

            <div id="myModal" class="modal">
                <span class="close" onclick="closeImage()">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption">
                </div>
            </div>
        @else
            
        @endif
    @endunless
    <style>
        #linkTag {
            text-decoration: none;
            color: #5138ee;
        }
        #linkTag:hover {
            text-decoration-line: underline;
            font-weight: 400;
            text-decoration-thickness: 2px;
            color: #1f0098;
        }
        .descriptionBx {
            border-top: 4px solid #5138ee;
        }
        .metaData {
            font-size: 0.8rem;
        }
        .modal-footer a {
            background: #5138ee;
            color: white;
            border: none;
        }
        .modal-footer a:hover {
            background: #1f0098;
            color: white;
        }
    </style>
</div>
