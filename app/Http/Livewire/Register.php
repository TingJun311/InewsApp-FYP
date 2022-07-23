<?php

namespace App\Http\Livewire;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => ['required', 'min:6'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'confirmed','min:8', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
        'password_confirmation' => ['required']
        // Regular expressions 
        // English uppercase characters (A – Z)
        // English lowercase characters (a – z)
        // Base 10 digits (0 – 9)
        // Non-alphanumeric (For example: !, $, #, or %)
        // Unicode characters
    ];

    protected $messages = [
        'password.regex' => 'Password must contains upper and lowercase letters, numbers and Non-alphanumeric characters'
    ];

    public function render()
    {
        return view('livewire.register');
    }

    public function updated($inputField) {
        $this->validateOnly($inputField);
    }

    public function createUser() {
        $formValue = $this->validate();

        // Hash password
        $formValue['password'] = bcrypt($formValue['password']);

        // Create user
        $user = User::create($formValue);

        // Login
        auth()->login($user);
        session()->flash('message', 'Sign Up successfully');
        return redirect()->to('/');
    }
}
