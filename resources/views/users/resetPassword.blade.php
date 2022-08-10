
<x-layout>
    <div class="container p-5 resetPwForm">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('images/loginLogo.png') }}" class="img-fluid" alt="" style="max-width: 25%;">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-4"></div>
            <div class="col-12 col-xl-4 shadow-lg p-5">
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mb-3">
                                {{-- Email --}}
                                <label for="email">Email:</label> <br>
                                <input 
                                    type="email" 
                                    name="email" 
                                    value="{{ old('email', $request->email) }}"
                                    @error('email')
                                        style="border-color: red;"
                                    @enderror 
                                    required >
                                @error('email')
                                    <span class="errorMessage">{{ $message }}</span>
                                @enderror
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                {{-- Password --}}
                                <label for="password">Password: </label> <br>
                                <input 
                                    type="password" 
                                    name="password" 
                                    value="{{ old('password') }}" 
                                    @error('password')
                                        style="border-color: red;"
                                    @enderror
                                    required 
                                    autofocus 
                                    >
                                @error('password')
                                    <span class="errorMessage">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                {{-- Confirm password --}}
                                <label for="password_confirmation">Confirm Password:</label> <br>
                                <input 
                                    type="password" 
                                    name="password_confirmation"
                                    @error('password_confirmation')
                                        style="border-color: red;"
                                    @enderror 
                                    required>
                                @error('password_confirmation')
                                    <span class="errorMessage">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit">
                                    Reset password
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-xl-4"></div>
        </div>
    </div>
</x-layout>
