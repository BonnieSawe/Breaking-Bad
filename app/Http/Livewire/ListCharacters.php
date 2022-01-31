<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Character;
use Livewire\WithPagination;

class ListCharacters extends Component
{
    use WithPagination;
    public $searchTerm;
    public $selectedSeason;
    public $selectedShow;
    public $categories = [
        'Breaking Bad',
        'Better Call Saul'
    ];
    public $seasons = [1, 2, 3, 4, 5,];

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $selectedShow = '%'.$this->selectedShow.'%';
        $selectedSeason = intval($this->selectedSeason);

        $query = Character::query();

        if ($searchTerm) {
            $query = $query->where('name','like', $searchTerm);
        }
        if ($this->selectedSeason) {
            $query = $query->whereJsonContains('appearance', $selectedSeason);
        }
        if ($selectedShow) {
            $query = $query->where('category', 'like', $selectedShow);
        }

        $characters = $query->paginate(30);

        return view('livewire.list-characters', compact('characters'))->extends('app');
    }
}
