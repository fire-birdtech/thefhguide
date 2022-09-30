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
        Schema::table('collections', function (Blueprint $table) {
            $table->boolean('locked')->default(false);
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('locked')->default(false);
        });
        Schema::table('goals', function (Blueprint $table) {
            $table->boolean('locked')->default(false);
        });
        Schema::table('choices', function (Blueprint $table) {
            $table->boolean('locked')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collections', function (Blueprint $table) {
            $table->dropColumn('locked');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('locked');
        });
        Schema::table('goals', function (Blueprint $table) {
            $table->dropColumn('locked');
        });
        Schema::table('choices', function (Blueprint $table) {
            $table->dropColumn('locked');
        });
    }
};
