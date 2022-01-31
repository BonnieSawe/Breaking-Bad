<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'birthday', 'occupation', 'img', 'status', 'nickname',
        'appearance', 'portrayed', 'category', 'better_call_saul_appearance'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'occupation' => 'array',
        'better_call_saul_appearance' => 'array',
        'appearance' => 'array'
    ];

    /**
     * Get the Death for the character.
     *
     * @return HasOne
     */
    public function death(): HasOne
    {
        return $this->hasOne(Death::class);
    }
}
