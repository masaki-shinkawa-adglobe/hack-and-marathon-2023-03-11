<?php

namespace App\Http\Controllers;

use App\Models\PostImageLike;
use Illuminate\Http\Request;

class updateLikeController extends Controller
{
    public function __construct(private PostImageLike $postImageLike)
    {
        
    }
    public function execute(Request $request)
    {
        $userId = 1;
    
        $isLike = $request->isLike;
        if ($isLike) {
            $this->postImageLike->firstOrCreate([
                'user_id' => $userId,
                'post_image_id' => $request->imageId
            ]);
        } else {
            $this->postImageLike
                ->where('user_id',$userId)
                ->where('post_image_id',$request->imageId)
                ->delete();
        }

        $likeCount = $this->postImageLike->getCountByimageId($request->imageId);

        return response()->json([
            'isLike' => $isLike,
            'likeCount' => $likeCount
        ]);

    }
}
