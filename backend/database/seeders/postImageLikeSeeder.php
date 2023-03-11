<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostImageLike;

class postImageLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PostImageLike::create([
            'user_id' => 2,
            'post_image_id' => 2,
        ]);
    }
}
