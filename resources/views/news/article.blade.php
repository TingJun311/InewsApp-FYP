
<link rel="stylesheet" href="{{ asset('css/article.css') }}">
<link rel="stylesheet" href="{{ asset('css/loading.css') }}">
<script src="{{ asset('js/article.js') }}" defer></script>
<x-layout>
    <livewire:navbar />
    <livewire:news-article :link="$link" />
    <livewire:footer />
</x-layout>