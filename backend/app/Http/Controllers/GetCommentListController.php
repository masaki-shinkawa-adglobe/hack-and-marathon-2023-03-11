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
    public function list(int $postId): array
    {
        $comment = new PostComment();

        $comments = $comment->getComments($postId);
        $response = $comments->map(function($val) {
            return [
                'comment' => $val->comment,
                'name' => $val->user->name,
                'date' => $val->created_at->format('Y-m-d H:i:s')
            ];
        });
        return ['comments' => $response];
    }
}
