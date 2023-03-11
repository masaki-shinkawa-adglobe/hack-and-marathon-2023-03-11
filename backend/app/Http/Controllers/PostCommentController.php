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
    public function store(Request $request, int $postId): bool
    {
        $parameters = [
            'user_id' => $request->input('userId'),
            'post_id' => $postId,
            'comment' => $request->input('comment'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $comment = PostComment::create($parameters);
        return true;
    }
}
