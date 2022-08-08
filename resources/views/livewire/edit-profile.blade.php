<div id="settings">
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
        <div class="container">
            <div class="row">
                <div class="col-12 p-3">
                    <h2>
                        <strong>
                            Account Settings
                        </strong>
                    </h2>
                    <p>Change Your profile and account settings</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-2  my-5">
                    <div class="d-flex flex-column ">
                        <div class="px-5">
                            <strong>
                                <a href="/user/profile/{{ auth()->id() }}">
                                    <i class="fa-solid fa-user"></i> User
                                </a>
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-10 p-5 shadow">
                    {{-- User tabs --}}
                    <div id="setUser" >
                        <div class="d-flex flex-column flex-lg-row justify-content-between mb-5">
                            <div class="mb-3">
                                <label for="userNameBx">Username: </label>
                                <input type="text" wire:model.defer="userName" id="userNameBx">
                                @error('userName')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="lang">Language: </label>
                                <select name="lang" id="lang" wire:model.defer="lang">
                                    <option value="en" {{ $displayLang['en'] }}>English</option>
                                    <option value="de" {{ $displayLang['de'] }}>German</option>
                                    <option value="fr" {{ $displayLang['fr'] }}>French</option>
                                    <option value="es" {{ $displayLang['es'] }}>Spanish</option>
                                    <option value="it" {{ $displayLang['it'] }}>Italian</option>
                                </select>
                            </div>
                        </div>
                        <div wire:loading.remove class="text-end" id="updatedMsg">
                            <div class="d-flex flex-row justify-content-end">
                                <div class="p-2 align-self-center">
                                    last updated
                                    {{ $userData->updated_at->diffForHumans() }}
                                </div>
                                <div class="p-2">
                                    <button wire:click="editUserProfile">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="text-end pe-5">
                            <div wire:loading wire:target="editUserProfile">
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
