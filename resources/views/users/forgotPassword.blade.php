
<x-layout>

    <div class="container p-5" id="resetPwForm">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('images/registerLogo.png') }}" class="img-fluid" alt="" style="max-width: 150px;">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4"></div>
            <div class="col-12 col-lg-4 shadow-lg p-5">
                @if (session('resetPassword'))
                    <p>Updated your current password? Kindly confirm your password below. If yes we will send you a link to update your password</p>
                @else
                    <p>Forgot your password? No problem. Just let us know your email address and we will email you a password  reset link that will allow you to choose a new one.</p>
                @endif

                {{-- Session status  --}}
                <x-session-message :status="session('status')" />

                {{-- Reset email form --}}
                <form method="POST" action="/forgot-password" class="mt-5">
                    @csrf
                    <label for="email">Email address: </label><br>
                    @if (session('resetPassword'))
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ session('resetPassword') }}"
                            @error('email')
                                style="border-color: red;"
                            @enderror
                            disabled
                        >
                    @else
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old("email") }}"
                            @error('email')
                                style="border-color: red;"
                            @enderror
                        >
                    @endif
                    @error('email')
                        <span class="errorMessage">{{ $message }}</span>
                    @enderror
                    <br>
                    <button type="submit" class="mt-3">Send Email</button>
                </form>
            </div>
            <div class="col-12 col-lg-4"></div>
        </div>
    </div>
</x-layout>