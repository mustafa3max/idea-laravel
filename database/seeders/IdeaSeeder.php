<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IdeaSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 50) as $index) {
            $tags = Tag::inRandomOrder()->limit(3)->get('tag');
            $tags = [$tags[0]->tag, $tags[1]->tag, $tags[2]->tag];
            Idea::create([
                'data' => Str::random(random_int(100, 5000)),
                'tags' => array_slice($tags, random_int(0, 2)),
            ]);
        }
    }
}
