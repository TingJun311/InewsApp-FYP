
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<x-layout>
    <livewire:navbar />
    {{-- Navigation bar --}}
    <div class="container-fiuld">
        <div class="row">
            <div class="col-12 col-xxl-3">
                <livewire:side-nav />
            </div>
            <div class="col-12 col-xxl-7 text-center">
                <livewire:main-content />
            </div>
            <div class="col-12 col-xxl-2">
                <p>right section</p>
            </div>
        </div>
    </div>
    <livewire:footer />
</x-layout>