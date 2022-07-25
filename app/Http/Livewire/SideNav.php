<?php

namespace App\Http\Livewire;

use Livewire\Component;
use stdClass;

class SideNav extends Component
{
    public $userInput;
    public $q;
    public $categories = array(
        'latest' => null,
        'war in ukraine' => null,
        'coronavirus' => null,
        'climate' => null,
        'business' => null,
        'technology' => null,
        'sciences' => null,
        'health' => null,
        'entertainment' => null,
    );

    public $test;

    public function render()
    {
        return view('livewire.side-nav');
    }

    public function mount($userInput) {
        $this->q = $userInput['q'];
        $this->update();
    }

    public function update() {
        switch ($this->q) {
            case 'latest':
                $this->categories['latest'] = 'currentActiveTab';
                break;
            case 'war in ukraine':
                $this->categories['war in ukraine'] = 'currentActiveTab';
                break;
            case 'coronavirus':
                $this->categories['coronavirus'] = 'currentActiveTab';
                break;
            case 'climate':
                $this->categories['climate'] = 'currentActiveTab';
                break;
            case 'business':
                $this->categories['business'] = 'currentActiveTab';
                break;
            case 'technology':
                $this->categories['technology'] = 'currentActiveTab';
                break;
            case 'sciences':
                $this->categories['sciences'] = 'currentActiveTab';
                break;
            case 'health':
                $this->categories['health'] = 'currentActiveTab';
                break;
            case 'entertainment':
                $this->categories['entertainment'] = 'currentActiveTab';
                break;
            default:
                break;
        }
    }
}
