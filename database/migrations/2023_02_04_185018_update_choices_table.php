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
        Schema::table('choices', function (Blueprint $table) {
            $table->dropColumn('instructions');
            $table->dropColumn('summary');
            $table->dropColumn('resources');
            $table->dropColumn('review');
            $table->dropColumn('exercises');

            $table->json('content')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('choices', function (Blueprint $table) {
            $table->dropColumn('content');

            $table->longText('instructions')->after('name');
            $table->text('summary')->nullable()->after('instructions');
            $table->text('resources')->nullable()->after('summary');
            $table->text('review')->nullable()->after('resources');
            $table->text('exercises')->nullable()->after('review');
        });
    }
};
