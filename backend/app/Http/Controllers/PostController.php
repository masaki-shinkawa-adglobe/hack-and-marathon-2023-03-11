<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, PostImage};

class PostController extends Controller
{
    // 投稿一覧
    public function index(Request $request)
    {
        $query = Post::query();

        if ($request->title) {
            $query = $query->where("title", $request->title);
        }

        if ($request->isBookmark) {
            $query = $query->whereHas(
                "bookmark",
                fn ($q) => $q->whereNotNull("id")
            );
        }

        if (count($request->tags ?? []) > 0) {
            $query = $query->whereHas(
                "tags",
                function ($q) use ($request) {
                    foreach ($request->tags as $tag) {
                        $q = $q->orWhere("tag", $tag);
                    }
                }
            );
        }

        return [
            "posts" => $query->get()->map(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "detail" => $item->detail,
                "image" => $item->images()->first(),
                "isBookmark" => $item->bookmark()->exists(),
                "date" => $item->created_at
            ])
        ];
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
