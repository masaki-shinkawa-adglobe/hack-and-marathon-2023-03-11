<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'post_tags';

    public function getTags(): object
    {
        return DB::table($this->table)
            ->whereNull('deleted_at')
            ->get();
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
