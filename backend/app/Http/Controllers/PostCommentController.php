<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PostComment;
use Carbon\Carbon;

class PostCommentController extends Controller
{
    /**
     * コメント投稿
     */
    public function store(Request $request, int $postId)
    {
        $userId = 1;
        $parameters = [
            'user_id' => $userId,
            'post_id' => $postId,
            'comment' => $request->input('comment'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        PostComment::create($parameters);
        response()->json([]);
    }
}
