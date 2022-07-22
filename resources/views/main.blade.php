
<x-layout>
    {{-- Navigation bar --}}
    <livewire:navbar />
    <div class="container-fiuld">
        <div class="row">
            <div class="col-12 col-xxl-3">
                <livewire:side-nav />
            </div>
            <div class="col-12 col-xxl-7">
                <p>main content</p>
            </div>
            <div class="col-12 col-xxl-2">
                <p>right section</p>
            </div>
        </div>
    </div>
    <livewire:footer />
</x-layout>