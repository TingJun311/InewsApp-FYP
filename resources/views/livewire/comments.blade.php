<div>
    <div wire:loading wire:target="postComment">
        <p>Laoding...</p>
    </div>
    @if ($blogComment != null)
        @foreach ($blogComment as $comment)
            {{-- <div class="d-flex flex-row justify-content-between">
                <div>
                    <h6>{{ $comment->name }}</h6>
                </div>
                <div>
                    <span>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                </div>
            </div>
            <div clas="d-flex flex-column justify-content-start">
                <div>
                    <img 
                        class="user-avatar" 
                        src="{{ ($comment->profile_path)? asset('storage/' . $comment->profile_path) : asset('images/default1.png') }}">
                </div>
                <div>
                    <p>{{ $comment->comment }}</p>     
                </div>
            </div> --}}

            <div class="container-fiuld blogsGrid p-3">
                <div class="row">
                    <div class="col-2">
                        <div class="text-end">
                            <img 
                                src="{{ ($comment->profile_path)? asset('storage/' . $comment->profile_path) : asset('images/user_image.png') }}" 
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
                                        {{ $comment->name }}
                                    </h4>
                                </div>
                                <div class="me-3 flex-grow-1">
                                    <p class="grayText">{{ '@' . $comment->commenter }}</p>
                                </div>
                                <div>
                                    <p class="grayText">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        @endforeach
    @endif
    <input type="text" name="comment" wire:model.lazy="userComment">
    @error('userComment')
        <p>{{ $message }}</p>
    @enderror
    <button wire:click="postComment">
        comment
    </button>

    <style>
        img.user-avatar {
            min-width: 40px;
            width: 40px;
            height: 40px;
            border-radius: 25px;
            background: #ddd;
            margin-right: 1rem;
        }
    </style>
</div>
