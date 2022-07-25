<div>
    @foreach ($foo as $article)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $article['media'] }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $article['title'] }}
                        </h5>
                        <p class="card-text">
                            {{ $article['summary'] }}
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                {{ $article['published_date'] }}
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>    
    @endforeach
</div>
