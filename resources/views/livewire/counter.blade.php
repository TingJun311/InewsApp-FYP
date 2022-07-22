<div>
    <p>{{ $counter }}</p>
    <p>{{ $data }}</p>
    <button wire:click="increment">+</button>
    <button wire:click="decrement">-</button>

    <div wire:loading >
        <p>Laoding...</p>
    </div>
    <button wire:click="get">Show data</button>
    {{ $data }}
</div>
