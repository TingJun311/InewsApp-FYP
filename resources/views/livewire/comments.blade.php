<div>
    <div wire:loading wire:target="postComment">
        <p>Laoding...</p>
    </div>
    @if ($blogComment != null)
        @foreach ($blogComment as $comment)
            <div class="d-flex flex-row justify-content-between">
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
                        src="{{ ($comment->profile_path)? asset('storage/' . $comment->profile_path) : asset('images/default1.png') }}"></img>

                </div>
                <div>
                    <p>{{ $comment->comment }}</p>     
                </div>
            </div>
        @endforeach
        {{-- {{ dd($blogComment) }} --}}
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
