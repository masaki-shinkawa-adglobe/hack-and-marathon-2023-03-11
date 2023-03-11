<?php
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PostComment;

class GetCommentListController 
{
    /**
     * コメント一覧を取得
     *
     * @return object
     */
    public function list(Request $request): object
    {
        $comment = new PostComment();

        $response = $comment->getComment();

        return $response;
    }
}
