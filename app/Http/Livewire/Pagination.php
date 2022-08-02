<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pagination extends Component
{
    public $page, $lang, $query, $totalPage;
    public function render()
    {
        return view('livewire.pagination');
    }
}
