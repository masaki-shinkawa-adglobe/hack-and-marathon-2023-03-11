<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PostTag;
use App\Models\PostImage;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    /**
     * ハッシュタグ一覧を取得
     *
     * @return object
     */
    public function index(): array
    {
        $subQuery = PostImage::select("post_images.post_id", "post_images.base64", DB::raw("count(post_image_likes.id) as like_count"))
            ->leftJoin("post_image_likes", "post_images.id", "=", "post_image_likes.post_image_id")
            ->groupBy("post_images.post_id", "post_images.base64");
        $rows = PostTag::select("tag", "sub.base64", "sub.like_count")
            ->leftJoinSub($subQuery, "sub", fn ($join) => $join->on("post_tags.post_id", "=", "sub.post_id"))
            ->orderByDesc("like_count")
            ->get();

        return [
            "tags" => $rows->map(fn ($item) => [
                "tag" => $item->tag,
                "image" => $item->base64,
            ])
        ];
    }
}
