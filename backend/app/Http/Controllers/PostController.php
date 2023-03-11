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
            foreach ($request->tags as $tag) {
                $query = $query->whereHas("tags", fn ($q) => $q->where("tag", $tag));
            }
        }

        return [
            "posts" => $query->get()->map(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "detail" => $item->detail,
                "image" => $item->images()->first()?->base64,
                "isBookmark" => $item->bookmark()->exists(),
                "date" => $item->created_at,
            ])
        ];
    }

    // 投稿
    public function store(Request $request)
    {
        $matches = [];
        preg_match_all("/#(?P<tag>\S+)/", $request->detail, $matches);

        $post = Post::create([
            "user_id" => 1,
            "title" => $request->title,
            "detail" => $request->detail,
        ]);

        $post->images()->createMany(array_map(fn ($image) => ["base64" => $image], $request->images));
        $post->tags()->createMany(array_map(fn ($tag) => ["tag" => $tag], $matches["tag"]));
        return ["id" => $post->id];
    }

    // 投稿詳細
    public function show(Request $request, int $postId)
    {
        $post = Post::find($postId);
        return [
            "id" => $post->id,
            "title" => $post->title,
            "images" => $post->images()->get()->map(fn ($item) => [
                "id" => $item->id,
                "base64" => $item->base64,
                "isLike" => $item->likes()->where("user_id", 1)->exists(),
                "likeCount" => $item->likes()->count(),
            ]),
            "isBookmark" => $post->bookmark()->exists(),
            "tags" => $post->tags()->get()->map(fn ($item) => $item->tag),
            "date" => $post->created_at,
        ];
    }
}
