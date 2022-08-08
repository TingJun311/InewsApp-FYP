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
        $selectedLang;

    public $displayLang = [
        'en' => null,
        'de' => null,
        'fr' => null,
        'es' => null,
        'it' => null,
    ];


    protected $rules = [
        'userName' => ['required', 'min:6'],
    ];

    public function render()
    {
        return view('livewire.edit-profile');
    }

    public function updated () {
        if ($this->profileImages != null) {
            $path = $this->profileImages->store('profilePhoto', 'public');
            $this->userData->profile_path = $path;
        }   
        $this->userData->save();
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

        $this->userData->lang = $this->lang;
        $this->userData->updated_at = now();
        $this->userData->save();
    }

    public function checkLang () {
        switch ($this->lang) {
            case 'en':
                $this->displayLang['en'] = 'selected';
                break;
            case 'de':
                $this->displayLang['de'] = 'selected';
                break;
            case 'fr':
                $this->displayLang['fr'] = 'selected';
                break;
            case 'es':
                $this->displayLang['es'] = 'selected';
                break;
            case 'it':
                $this->displayLang['it'] = 'selected';
                break;
        }
    }
}
