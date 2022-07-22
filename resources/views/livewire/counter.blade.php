<div>
    <p>{{ $counter }}</p>
    {{-- <p>{{ $data }}</p> --}}
    <button wire:click="increment">+</button>
    <button wire:click="decrement">-</button>
    <button wire:click="get">Show data</button>
    {{-- {{ $data }} --}}
    <div wire:loading >
        <p>Laoding...</p>
    </div>
</div>

