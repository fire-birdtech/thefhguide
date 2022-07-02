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
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('instructions');
            $table->text('summary')->nullable();
            $table->text('resources')->nullable();
            $table->text('review')->nullable();
            $table->text('exercises')->nullable();
            $table->unsignedSmallInteger('order')->nullable();
            $table->unsignedInteger('goal_id');
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
        Schema::dropIfExists('choices');
    }
};
