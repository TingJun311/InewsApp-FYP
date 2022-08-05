<div>
    <div wire:loading wire:target="postComment">
        <p>Laoding...</p>
    </div>
    @if ($blogComment != null)
        @foreach ($blogComment as $comment)
            <div class="container-fiuld p-3">
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
    <div class="d-flex flex-row justify-content-center inputBox py-3 mt-2">
        <div>
            <img class="user-avatar" src="{{ asset('images/default1.png') }}" alt="">
        </div>
        <div class="inputComment align-self-center mx-2">
            <input type="text" name="comment" wire:model.lazy="userComment" placeholder="Your comment...">
            @error('userComment')
                <p>{{ $message }}</p>
            @enderror
            <button wire:click="postComment">
                comment
            </button>
        </div>
    </div>

    <style>
        img.user-avatar {
            min-width: 40px;
            width: 30px;
            height: 40px;
            border-radius: 25px;
            background: #ddd;
            margin-right: 1rem;
        }

        .inputComment button {
            border: none;
            font-size: 0.7rem;
            padding: 5px;
            border-radius: 20px;
            color: #fff;
            background: #5138ee;
        }
        .inputBox {
            border-top: 1px solid #ddd;
        }
        .inputComment button:hover {
            background: #1f0098;
        }
        .inputComment input {
            padding: 5px;
            border-radius: 20px;
            box-sizing: border-box;
            transition: linear 0.2s;
            border: 1px solid #d6d6d6;
            color: #333;
            font-size: 0.6rem;
        }
        .inputComment input:focus {
            outline: none;
            border: 1px solid #5138ee;
        }
    </style>
</div>
