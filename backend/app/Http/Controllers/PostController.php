<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, PostImage};

class PostController extends Controller
{
    // 投稿一覧
    public function index(Request $request)
    {
    }

    // 投稿
    public function store(Request $request)
    {
        $post = Post::create([
            "user_id" => 1,
            "title" => $request->title,
            "detail" => $request->detail,
        ]);

        $post->images()->createMany(array_map(fn ($image) => ["base64" => $image], $request->images));
        return $request;
    }

    // 投稿詳細
    public function show(Request $request, int $postId)
    {
    }
}
