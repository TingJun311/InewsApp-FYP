<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;
    public $userData, 
        $profileImages, 
        $userName, 
        $lang, 
        $displayLang,
        $selectedLang;


    protected $rules = [
        'userName' => ['required', 'min:6'],
    ];

    public function render()
    {
        return view('livewire.edit-profile');
    }

    public function boot () {
        $this->userData = User::find(auth()->id());
        $this->userName = $this->userData->name;
        $this->lang = $this->userData->lang;
        $this->checkLang();
    }

    public function editUserProfile () {
        $this->validate();

        if ($this->profileImages != null) {
            $path = $this->profileImages->store('profilePhoto', 'public');
            $this->userData->profile_path = $path;
        }   

        if ($this->selectedLang != null) {
            $this->userData->lang = $this->selectedLang;
        }
        $this->userData->save();
    }

    public function checkLang () {
        switch ($this->lang) {
            case 'en':
                $this->displayLang = 'English';
                break;
            case 'de':
                $this->displayLang = 'German';
                break;
            case 'fr':
                $this->displayLang = 'French';
                break;
            case 'es':
                $this->displayLang = 'Spanish';
                break;
            case 'it':
                $this->displayLang = 'Italian';
                break;
        }
    }
}
