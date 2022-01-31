<?php

namespace App\Http\Livewire;

use App\Models\Character;
use Livewire\Component;

class ViewCharacter extends Component
{
    public $character;
    public function mount(Character $character)
    {
        $this->character = $character->load('death', 'quotes');
    }

    public function render()
    {
        return view('livewire.view-character')->extends('app');
    }
}
