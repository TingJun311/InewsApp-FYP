<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $foo;
    public function render()
    {
        return view('livewire.card');
    }
}
