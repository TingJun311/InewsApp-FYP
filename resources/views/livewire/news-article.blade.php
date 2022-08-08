<div wire:init="getArticles">
    @php
        use Illuminate\Support\Str;
        $whiteSpace = '\n';
    @endphp
    <div wire:loading wire:target="getArticles" wire:loading.class="loadingScreen">
        {{-- <div class="vertical-centered-box">
            <div class="content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                    <div class="loader-line"></div>
                </div>
                <svg width="36px" height="24px" viewBox="0 0 36 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="M8.98885921,23.8523026 C8.8942483,23.9435442 8.76801031,24 8.62933774,24 L2.03198365,24 C1.73814918,24 1.5,23.7482301 1.5,23.4380086 C1.5,23.2831829 1.55946972,23.1428989 1.65570253,23.0416777 L13.2166154,12.4291351 C13.3325814,12.3262031 13.4061076,12.1719477 13.4061076,11.999444 C13.4061076,11.8363496 13.3401502,11.6897927 13.2352673,11.587431 L1.68841087,0.990000249 C1.57298556,0.88706828 1.5,0.733668282 1.5,0.561734827 C1.5,0.251798399 1.73814918,2.85130108e-05 2.03198365,2.85130108e-05 L8.62933774,2.85130108e-05 C8.76855094,2.85130108e-05 8.89532956,0.0561991444 8.98994048,0.148296169 L21.4358709,11.5757407 C21.548593,11.6783875 21.6196864,11.8297916 21.6196864,11.999444 C21.6196864,12.1693815 21.5483227,12.3219261 21.4350599,12.4251432 L8.98885921,23.8523026 Z M26.5774333,23.8384453 L20.1765996,17.9616286 C20.060093,17.8578413 19.9865669,17.703871 19.9865669,17.5310822 C19.9865669,17.3859509 20.0390083,17.2536506 20.1246988,17.153855 L23.4190508,14.1291948 C23.5163648,14.0165684 23.6569296,13.945571 23.8131728,13.945571 C23.9602252,13.945571 24.0929508,14.0082997 24.1894539,14.1092357 L33.861933,22.9913237 C33.9892522,23.0939706 34.0714286,23.2559245 34.0714286,23.4381226 C34.0714286,23.748059 33.8332794,23.9998289 33.5394449,23.9998289 L26.9504707,23.9998289 C26.8053105,23.9998289 26.6733958,23.9382408 26.5774333,23.8384453 Z M26.5774333,0.161098511 C26.6733958,0.0615881034 26.8053105,0 26.9504707,0 L33.5394449,0 C33.8332794,0 34.0714286,0.251769886 34.0714286,0.561706314 C34.0714286,0.743904453 33.9892522,0.905573224 33.861933,1.00822006 L24.1894539,9.89030807 C24.0929508,9.99152926 23.9602252,10.0542579 23.8131728,10.0542579 C23.6569296,10.0542579 23.5163648,9.98354562 23.4190508,9.87063409 L20.1246988,6.8459739 C20.0390083,6.74617837 19.9865669,6.613878 19.9865669,6.46874677 C19.9865669,6.29624305 20.060093,6.14198767 20.1765996,6.03848544 L26.5774333,0.161098511 Z" fill="#FFFFFF"></path>
                </svg>
                <div class="text-center">
                    <img src="{{ asset('images/favicon_io/favicon-32x32.png') }}" alt="">
                </div>
            </div>
        </div> --}}
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
