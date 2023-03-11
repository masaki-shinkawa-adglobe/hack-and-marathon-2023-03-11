<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "title",
        "detail",
    ];

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }

    public function tags()
    {
        return $this->hasMany(PostTag::class);
    }

    public function bookmark()
    {
        return $this->hasOne(PostBookmark::class);
    }
}
