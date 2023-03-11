<?php

namespace App\Http\Controllers;

use App\Models\PostBookmark;
use Illuminate\Http\Request;

class updateBookmarkController extends Controller
{
    public function __construct(private PostBookmark $postBookmark)
    {
        
    }
    public function execute(Request $request)
    {
        $userId = 1;
    
        $isBookmark = $request->isBookmark;
        if ($isBookmark) {
            $this->postBookmark->firstOrCreate([
                'user_id' => $userId,
                'post_id' => $request->postId
            ]);
        } else {
            $this->postBookmark
                ->where('user_id',$userId)
                ->where('post_id',$request->postId)
                ->delete();
        }

        return response()->json(['isBookmark' => $isBookmark]);

    }
}
