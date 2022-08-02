
<link rel="stylesheet" href="{{ asset('css/searchResult.css') }}">
<x-layout>
    <div class="fixed-top">
        <livewire:navbar />
    </div>

    <br>
    <livewire:search-result 
        :query="$query" 
        :lang="$lang" 
        :page="$page" 
    />

    {{-- <livewire:pagination :query="$query" :lang="$lang" :page="$page" /> --}}
    <livewire:footer />
</x-layout>