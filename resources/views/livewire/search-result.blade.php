<div wire:init="getResult">
    <div wire:loading wire:target="getResult" wire:loading.class="loadingScreen">
        <div class="text-center loadingScreen">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    {{-- {{ print_r($data) }} --}}
</div>
