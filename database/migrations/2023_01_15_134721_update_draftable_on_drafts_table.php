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
            $table->dropIndex(['draftable_type', 'draftable_id']);
            $table->dropColumn('draftable_id');
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
            $table->unsignedBigInteger('draftable_id')->after('draftable_type');
            $table->index(['draftable_type', 'draftable_id']);
        });
    }
};
