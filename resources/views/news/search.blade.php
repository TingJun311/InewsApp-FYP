
<link rel="stylesheet" href="{{ asset('css/searchResult.css') }}">
<x-layout>
    <livewire:navbar />

    <livewire:search-result 
        :query="$query" 
        :lang="$lang" 
        :page="$page" 
    />

    <nav class="d-flex flex-row justify-content-evenly" method="GET" action="/search">
        <div class='p-2'>
            <form action="/search" method="GET">
                <input type="hidden" name="query" value="{{ $query }}">
                <input type="hidden" name="lang" value="{{ $lang }}">
                <input type="hidden" name="page" value="{{ ((int)$page - 1) }}">
                <button type="submit">Previous</button>
            </form>
        </div>
        <div class='p-2'>
            <form action="/search" method="GET">
                <input type="hidden" name="query" value="{{ $query }}">
                <input type="hidden" name="lang" value="{{ $lang }}">
                <input type="hidden" name="page" value="{{ ((int)$page + 1) }}">
                <button type="submit">Next</button>
            </form>
        </div>
    </nav>
    <livewire:footer />
</x-layout>