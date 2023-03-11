<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImageLike extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getCountByimageId($imageId)
    {
        return $this->where('post_image_id', $imageId)->count();  
    }
}
