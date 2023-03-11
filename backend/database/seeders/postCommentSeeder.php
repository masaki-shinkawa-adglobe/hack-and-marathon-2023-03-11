<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostComment;

class postCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostComment::create([
            'user_id' => 2,
            'post_id' => 1,
            'comment' => '今の所リタイアしてる人いないんだけど'
        ]);
        PostComment::create([
            'user_id' => 1,
            'post_id' => 2,
            'comment' => 'カツが足りない'
        ]);
    }
}
