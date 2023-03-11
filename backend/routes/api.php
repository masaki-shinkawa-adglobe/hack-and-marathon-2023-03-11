<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 投稿一覧
Route::get('/posts', function (Request $request) {
    return "";
});

// 投稿
Route::post('/posts', function (Request $request) {
    return "";
});

// 投稿詳細
Route::get('/posts/{postId}', function (Request $request) {
    return "";
});

// ブックマーク切り替え
Route::post('/posts/{postId}/bookmark', function (Request $request) {
    return "";
});

// いいね切り替え
Route::post('/images/{imageId}/like', function (Request $request) {
    return "";
});

// ハッシュタグ一覧
Route::get('/tags', function (Request $request) {
    return "";
});

// コメント一覧
Route::get('/posts/{postId}/comment', function (Request $request) {
    return "";
});

// コメント投稿
Route::post('/posts/{postId}/comment', function (Request $request) {
    return "";
});
