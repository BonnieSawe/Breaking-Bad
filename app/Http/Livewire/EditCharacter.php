<?php

namespace App\Http\Livewire;

use App\Models\Character;
use App\Models\Quote;
use Livewire\Component;

class EditCharacter extends Component
{
    public $character;

    public $form;

    public $quoteForm;

    public $statusOptions = [
        'Presumed dead' => 'Presumed dead',
        'Alive' => 'Alive'
    ];

    public function mount(Character $character)
    {
        $this->character = $character->load('death', 'quotes');
        $this->form = [
            'name' => $character->name,
            'nickname' => $character->nickname,
            'occupation' => $character->occupation,
            'status' => $character->status,

            'cause' => $character->death ? $character->death->cause : null,
            'responsible' => $character->death ? $character->death->responsible : null,
            'last_words' => $character->death ? $character->death->last_words : null,
            'season' => $character->death ? $character->death->season : null,
            'episode' => $character->death ? $character->death->episode : null,
            'number_of_deaths' => $character->death ? $character->death->number_of_deaths : null,

            'quote_ids' => $character->quotes->map(function (Quote $quote) { return $quote->id;}),
            'quotes' => $character->quotes->map(function (Quote $quote) { return $quote->body;})
        ];
    }

    public function render()
    {
        return view('livewire.edit-character')->extends('app');
    }

    public function update()
    {
        if($this->form['status'] == 'Alive') {
            $this->validate([
                'form.name' => 'required|string',
                'form.nickname' => 'required|string',
                'form.occupation' => 'required|string',
                'form.status' => 'required|string',
            ]);
        } else {
            $this->validate([
                'form.name' => 'required|string',
                'form.nickname' => 'required|string',
                'form.occupation' => 'required|string',
                'form.status' => 'required|string',

                'form.cause' => 'required',
                'form.responsible' => 'required',
                'form.last_words' => 'required',
                'form.season' => 'required',
                'form.episode' => 'required',
                'form.number_of_deaths' => 'required',
            ]);
        }

        $character = $this->character;

        $character->update($this->form);

        if ($this->form['quotes'] && count($this->form['quotes']) > 0) {
            foreach ($this->form['quote_ids'] as $key => $quote_id ){
                if ($quote = Quote::find($quote_id)) {
                    $quote->body = $this->form['quotes'][$key];
                    $quote->save();
                }
            }
        }

        if ($character->death && $this->form['status'] == 'Alive') {
            $character->death->delete();
        } elseif($this->form['status'] == 'Presumed dead') {
            $character->death()->updateOrCreate(
                ['character_id' => $character->id],
                $this->form
            );
        }

        session()->flash('message', "Details Updated Successfully");

        return redirect(route('characters.show', $character->id));
    }
}
