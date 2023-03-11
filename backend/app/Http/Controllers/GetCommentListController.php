<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PostComment;

class GetCommentListController extends Controller
{
    /**
     * コメント一覧を取得
     *
     * @return object
     */
    public function list(int $postId): object
    {
        $comment = new PostComment();

        $response = $comment->getComments($postId);

        return $response;
    }
}
