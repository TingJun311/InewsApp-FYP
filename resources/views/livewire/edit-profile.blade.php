<div>
    <form wire:submit.prevent="editUserProfile">
        <div id="bannerBg"></div>
        <div class="profile-pic-div shadow-lg bg-body">
            @if ($userData->profile_path)
                <img src="{{ asset('storage/' . $userData->profile_path) }}" alt="" id="photo">
            @else
                <img src="{{ asset('images/default1.png') }}" alt="" id="photo">
            @endif
            @error('profileImages')
                <p>{{ $message }}</p>
            @enderror
            <label for="file" id="uploadBtn">Choose images</label>
            <input type="file" id="file" wire:model="profileImages">
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="d-flex flex-row justify-content-evenly">
            <div class="p-2">
                <label for="userNameBx">Username: </label>
                <input type="text" wire:model="userName" id="userNameBx" >
                @error('userName')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="p-2">
                <label for="lang">Language: </label>
                <select name="lang" id="lang" wire:model.lazy="selectedLang" value="{{ $displayLang }}">
                    <option value="en">English</option>
                    <option value="de">German</option>
                    <option value="fr">French</option>
                    <option value="es">Spanish</option>
                    <option value="it">Italian</option>
                </select>
            </div>
        </div>
        <button type="submit" wire:loading.remove>
            Save
        </button>
        <div wire:loading wire:target="editUserProfile">
            <p>Updating...</p>
        </div>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
        {{-- <p>{{ dd($userData) }}</p> --}}
</div>
