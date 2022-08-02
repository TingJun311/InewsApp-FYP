
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<x-layout>
    <div class="fixed-top">
        <livewire:navbar />
    </div>
    {{-- Navigation bar --}}

    <br>
    <br> 
    <br> 
    {{-- Main content --}}
    <livewire:main-content />

    {{-- Footer --}}
    <livewire:footer />
</x-layout>