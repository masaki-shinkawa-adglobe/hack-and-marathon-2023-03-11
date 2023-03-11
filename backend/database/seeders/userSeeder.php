<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::truncate();
        User::create([
            'id' => 1,
            'name' => 'アド太郎',
            'email' => 'ad@adglobe.co.jp',
            'password' => Hash::make('password')
        ]);
        User::create([
            'id' => 2,
            'name' => '新川雅起',
            'email' => 'shin@adglobe.co.jp',
            'password' => Hash::make('password')
        ]);
    }
}
