<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostComment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "user_id",
        "post_id",
        "comment",
        "created_at",
        "updated_at"
    ];

    protected $table = 'post_comments';

    public function getComments(int $postId) : ?object
    {
        return $this
            ->with('user')
            ->where('post_id', $postId)
            ->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    } 
}
