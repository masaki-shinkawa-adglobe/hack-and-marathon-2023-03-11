<?php
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PostComment;

class PostCommentController
{
    /**
     * コメント投稿
     */
    public function store(Request $request): int
    {
        $parameters = [
            'user_id' => $request->input('userId'),
            'post_id' => $request->input('postId'),
            'comment' => $request->input('comment')
        ];

        $comment = new PostComment();

        $id = $comment->insertGetId($parameters);

        return $id;
    }
}
