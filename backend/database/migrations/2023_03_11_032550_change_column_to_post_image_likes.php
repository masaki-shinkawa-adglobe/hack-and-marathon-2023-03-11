<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('post_image_likes', function (Blueprint $table) {
            // $table->renameColumn('post_id', 'post_image_id');
            $table->dropColumn('post_id');
            $table->unsignedInteger('post_image_id')->comment('投稿画像ID')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_image_likes', function (Blueprint $table) {
            $table->dropColumn('post_image_id');
            $table->unsignedInteger('post_id')->comment('投稿ID')->after('user_id');;
        });
    }
};
