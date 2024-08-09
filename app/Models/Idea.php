<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'tags',
        'user_ip',
        'enabled',
    ];

    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'ip', 'user_ip');
    }

    public function interactions(): HasMany
    {
        return $this->hasMany(Interaction::class, 'idea_id', 'id');
    }
}
