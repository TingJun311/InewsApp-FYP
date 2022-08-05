<div wire:init="getBlogs" >
    <div wire:loading>
        Laoding...
    </div>

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 p-3">
                @if ($blogs != null)
                    @foreach ($blogs as $blog)
                        <div class="container-fiuld blogsGrid p-3">
                            <div class="row">
                                <div class="col-2">
                                    <div class="text-end">
                                        <img 
                                            src="{{ asset('images/default1.png') }}" 
                                            class="img-fluid shadow-sm bg-body" 
                                            alt="..." 
                                            style="border-radius: 50%;"
                                        >
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex flex-row">
                                            <div class="me-3">
                                                <h4>
                                                    <strong>
                                                        {{ $blog->title }}
                                                    </strong>
                                                </h4>
                                            </div>
                                            <div class="me-3 flex-grow-1">
                                                <p class="grayText">@inewsAdmin</p>
                                            </div>
                                            <div>
                                                <p class="grayText">{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <p>{{ $blog->about }}</p>
                                            <div class="text-center blogImage my-5">
                                                @if ($blog->images != null)
                                                    <img src="{{ asset('storage/' . $blog->images) }}" alt="">
                                                @endif
                                            </div>
                                            <div class="d-flex flex-row justify-content-between">
                                                <div></div>
                                                <div></div>
                                                <div>
                                                    <button id="commentBtn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{ $blog->id }}" aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="fa-regular fa-comment-dots"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="container-fiuld mt-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="collapse" id="collapseExample{{ $blog->id }}">
                                                <div class="card card-body border-0">
                                                    <livewire:comments :blogId="$blog->id" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    @endforeach
                @else
                    <p>Error</p>
                @endif
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <style>
        .text-end img {
            width: 70%;
            height: 70%;
        }

        .blogsGrid {
            border-top: 1px solid #ced4da;
            border-bottom: 1px solid #ced4da;
        }

        #commentBtn {
            border: none;
            background-color: transparent;
        }
        #commentBtn i {
            font-size: 1.2rem;
            color: #5138ee;
        }
        #commentBtn i:hover {
            color: #1f0098;
        }

        .grayText {
            color: gray;
            font-size: 0.9rem;
        }
        .me-3 h4 {
            font-size: 1.2rem;
        }

        .blogImage img {
            border-radius: 15px;
            border: none;
            background-color: transparent;
            width: 70%;
            height: 50%;
        }
    </style>
</div>
