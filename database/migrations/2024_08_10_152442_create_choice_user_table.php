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
        Schema::create('choice_user', function (Blueprint $table) {
            $table->unsignedInteger('choice_id');
            $table->unsignedInteger('user_id');
            $table->longText('notes')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
            $table->timestamps();
            $table->primary(['choice_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choice_user');
    }
};
