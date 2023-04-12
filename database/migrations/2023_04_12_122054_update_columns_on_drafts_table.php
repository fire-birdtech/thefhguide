<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drafts', function (Blueprint $table) {
            $table->dropColumn(['instructions', 'review', 'exercises']);

            $table->string('cover_image_path', 2048)->nullable()->after('summary');
            $table->string('show_me_video_url')->nullable()->after('cover_image_path');
            $table->json('content')->nullable()->after('show_me_video_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drafts', function (Blueprint $table) {
            $table->dropColumn(['cover_image_path', 'show_me_video_url', 'content']);

            $table->longText('instructions')->nullable()->after('summary');
            $table->text('review')->nullable()->after('instructions');
            $table->text('exercises')->nullable()->after('review');
        });
    }
};
