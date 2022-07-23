
<div class="login-container">
    <div class="onboarding">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide color-1">
                    <div class="slide-image">
                        <img src="{{ asset('images/registerLogo.png') }}" loading="lazy" alt="" />
                    </div>
                    <div class="slide-content">
                        <h2>Explore the Inews</h2>
                        <p>Inews is an operational business division of the world Broadcasting Corporation responsible for the gathering and broadcasting of news and current affairs in around the world.</p>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="login-form">
    <div class="login-form-inner">
        <div class="logo">
            <a href="/">Back</a>
        </div>
            <h1>
                <strong>
                    Register
                </strong>
            </h1>

        <form wire:submit.prevent="createUser">
            @csrf
            <div class="login-form-group">
                <label for="username">Username <span class="required-star">*</span></label>
                <input 
                    wire:model="name"
                    name="name"
                    autocomplete="off" 
                    type="text" 
                    id="username errorBx"
                    value="{{ old('name') }}"
                    @error('name')  
                        style="border: 2px solid red"
                    @enderror
                >
                @error('name')
                    <p class="errorMsg">{{ $message }}</p>
                @enderror
            </div>
            <div class="login-form-group">
                <label for="email">Email <span class="required-star">*</span></label>
                <input 
                    wire:model="email"
                    name="email"
                    autocomplete="off" 
                    type="text" 
                    placeholder="email@website.com" 
                    id="email"
                    value="{{ old('email') }}"
                    @error('email')  
                        style="border: 2px solid red"
                    @enderror
                >
                @error('email')
                    <p class="errorMsg">{{ $message }}</p>
                @enderror
            </div>
            <div class="login-form-group">
                <label for="pwd">Password <span class="required-star">*</span></label>
                <input 
                    wire:model="password"
                    name="password"
                    autocomplete="off" 
                    type="password" 
                    placeholder="Minimum 8 characters" 
                    id="pwd"
                    value="{{ old('password') }}"
                    @error('password')  
                        style="border: 2px solid red"
                    @enderror
                >
                @error('password')
                    <p class="errorMsg">{{ $message }}</p>
                @enderror
            </div>
            <div class="login-form-group">
                <label for="confirmPw">Confirm password <span class="required-star">*</span></label>
                <input 
                    wire:model="password_confirmation"
                    name="password_confirmation"
                    autocomplete="off" 
                    type="password" 
                    placeholder="Re-type the password" 
                    id="confirmPw"
                    value="{{ old('password_confirmation') }}"
                    @error('password_confirmation')  
                        style="border: 2px solid red"
                    @enderror
                >
                @error('password_confirmation')
                    <p class="errorMsg">{{ $message }}</p>
                @enderror
            </div>

            <button class="rounded-button login-cta" type="submit">
                <a href="#" class="loginBtn">Sign Up</a>
            </button>
            
            <div class="login-form-group single-row">
                <div class="custom-check">
                    <div class="register-div">Already have an account? <a href="/signIn" class="link create-account" -link>Login here</a></div>
                </div>
            </div>
        </form>
    </div>
</div>
