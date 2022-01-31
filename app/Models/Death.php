<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Death extends Model
{
    use HasFactory;

    protected $fillable = [
        'character_id', 'cause', 'responsible', 'last_words', 'season', 'episode', 'number_of_deaths'
    ];

    /**
     * @return BelongsTo
     */
    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }
}
