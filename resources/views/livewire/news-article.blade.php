<div wire:init="getArticles">
    <div wire:loading wire:target="getArticles" wire:loading.class="loadingScreen">
        <div class="text-center loadingScreen">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    @unless ($data == null)
        @if ($data['status'] == 'ok')
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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-10">
                        <h2 class="m-5 float-start">{{ $data['article']['title'] }}</h2>
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
                            {{-- @error('link')
                                <p>{{}}</p>
                            @enderror --}}
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
                                            <a href="/signIn" class="btn btn-lg btn-primary w-100 mx-0 mb-2">Sign In or Register</a>
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
                <div class="line"></div>
            </div>
            <div class="container-fiuld">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-row justify-content-center">
                            <div class="p-5 m-2">
                                <h4>Summary</h4>
                                <p>
                                    {{ $data['article']['text'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-2">
                        <div class="d-flex flex-column flex-lg-column flex-sm-row justify-content-between">
                            <div class="m-5">
                                <h5>Author</h5>
                                <p>
                                    {{ (empty($data['article']['authors']))? '' : $data['article']['authors'][0] }}
                                </p>
                            </div>
                            <div class="m-5">
                                <h5>Published date</h5>
                                <p>
                                    {{ $data['article']['published'] }}
                                </p>
                            </div>
                            <div class="m-5">
                                <h5>Source</h5>
                                <p>
                                    {{ $data['article']['source_url'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10">
                        <div>
                            <div class="p-5">
                                <h5>Description</h5>
                                <p>
                                    {{ $data['article']['meta_description'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="myModal" class="modal">
                <span class="close" onclick="closeImage()">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption">
                </div>
            </div>
        @else
            <p>404</p>
        @endif
    @endunless
</div>
