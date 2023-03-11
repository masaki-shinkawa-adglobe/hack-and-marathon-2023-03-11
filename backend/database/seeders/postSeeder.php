<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //
        Post::create([
            'user_id' => 1,
            'title' => 'デスゲームやってみた',
            'detail' => 
'deathゲームやってみたんでよろしく

#death_game
#デスゲーム'
        ]);

        Post::create([
            'user_id' => 2,
            'title' => '大阪でおすすめのカレー屋',
            'detail' => 
'ダル食堂 堂島地下街店

#カレー
#北新地'
        ]);
    }
}
