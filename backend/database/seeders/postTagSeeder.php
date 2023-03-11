<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostTag;

class postTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostTag::create([
            'post_id' => 1,
            'tag' => 'デスゲーム'
        ]);
        PostTag::create([
            'post_id' => 2,
            'tag' => 'カレー'
        ]);
        PostTag::create([
            'post_id' => 2,
            'tag' => 'ダル食堂'
        ]);
    }
}
