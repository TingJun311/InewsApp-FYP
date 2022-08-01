<div wire:init="getComments">
    <input type="text" name="comment" wire:model.lazy="userComment">
    @error('userComment')
        <p>{{ $message }}</p>
    @enderror
    <button wire:click="postComment">
        comment
    </button>
</div>
