<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public $tags = [
        'apps',
        'sites',
        'programs',
        'commerce',
    ];

    public function run(): void
    {
        foreach ($this->tags as $id => $tag) {
            Tag::updateOrCreate(
                ['id' => $id + 1],
                ['tag' => $tag],
            );
        }
    }
}
