<div wire:init="getBlogs" >
    <div wire:loading>
        Laoding...
    </div>

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="d-flex flex-column justify-content-center">
                    @if ($blogs != null)
                        @foreach ($blogs as $blog)
                            <div class="p-2">
                                <h4>{{ $blog->title }}</h4>
                                <p>{{ $blog->about }}</p>
                                <div class="d-flex flex-row justify-content-end">
                                    <div class="p-1">
                                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{ $blog->id }}" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa-regular fa-comment-dots"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse" id="collapseExample{{ $blog->id }}">
                                    <div class="card card-body">
                                        <livewire:comments :blogId="$blog->id" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class='p-2'>Please wait</div>
                    @endif
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    {{-- @if ($blogs != null)
        {{ dd($blogs[0]->id) }}    
    @endif --}}
</div>
