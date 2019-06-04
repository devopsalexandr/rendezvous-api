<?php

namespace App\Models\Conversation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    protected $fillable = [
        'user_one',
        'user_two',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
