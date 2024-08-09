<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'idea_id',
        'user_ip',
        'easy',
        'unique',
        'difficult',
        'recurring',
        'impossible',
    ];
}
