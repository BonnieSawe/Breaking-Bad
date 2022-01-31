<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;

    protected $fillable = [
        'death', 'character_id', 'cause', 'responsible', 'last_words', 'season', 'episode', 'number_of_deaths'
    ];

    public function character() {
        $this->belongsTo(Character::class);
    }
}
