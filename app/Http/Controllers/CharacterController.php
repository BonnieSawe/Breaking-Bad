<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Death;
use App\Models\Quote;
use App\Services\FetchData;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function store()
    {
        $characters = (new FetchData)->getData('characters');

        foreach ($characters as $character) {
            $saved_character = Character::updateOrCreate(
                ['name' => $character->name],
                [
                    'birthday' =>  $character->birthday,
                    'occupation' => $character->occupation,
                    'img' => $character->img,
                    'status' => $character->status,
                    'nickname' => $character->nickname,
                    'appearance' => $character->appearance,
                    'portrayed' => $character->portrayed,
                    'category' => $character->category,
                    'better_call_saul_appearance' => $character->better_call_saul_appearance
                ]
            );

            $death = (new FetchData)->getData("death?name=$character->name");

            if ($death && $death[0]) {
                $death = $death[0];
                Death::updateOrCreate(
                    ['character_id' => $saved_character->id],
                    [
                        'death' => $death->death,
                        'cause' => $death->cause,
                        'responsible' => $death->responsible,
                        'last_words' => $death->last_words,
                        'season' => $death->season,
                        'episode' => $death->episode,
                        'number_of_deaths' => $death->number_of_deaths
                    ]
                );
            }

            $quotes = (new FetchData)->getData("quote?author=$character->name");

            foreach ($quotes as $quote) {
                Quote::create([
                    'body' => $quote->quote,
                    'character_id' => $saved_character->id
                ]);
            }
        }

    }
}
