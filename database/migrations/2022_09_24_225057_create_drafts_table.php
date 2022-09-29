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
        Schema::create('drafts', function (Blueprint $table) {
            $table->id();
            $table->morphs('draftable');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('assignment_id');
            $table->string('slug');
            $table->string('old_name')->nullable();
            $table->string('new_name')->nullable();
            $table->text('old_summary')->nullable();
            $table->text('new_summary')->nullable();
            $table->longText('old_instructions')->nullable();
            $table->longText('new_instructions')->nullable();
            $table->text('old_resources')->nullable();
            $table->text('new_resources')->nullable();
            $table->text('old_review')->nullable();
            $table->text('new_review')->nullable();
            $table->text('old_exercises')->nullable();
            $table->text('new_exercises')->nullable();
            $table->timestamp('publish_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drafts');
    }
};
