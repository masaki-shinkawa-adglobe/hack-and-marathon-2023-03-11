<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PostTag;

class TagController extends Controller
{
    /**
     * ハッシュタグ一覧を取得
     *
     * @return object
     */
    public function index(): array
    {
        $tags = new PostTag();

        $response = $tags->getTags();

        return ['tags' => $response];
    }
}
