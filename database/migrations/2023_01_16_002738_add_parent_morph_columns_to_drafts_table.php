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
            $table->string('parentable_type')->nullable()->after('draftable_type');
            $table->unsignedBigInteger('parentable_id')->nullable()->after('parentable_type');
            $table->index(['parentable_type', 'parentable_id']);
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
            $table->dropIndex(['parentable_type', 'parentable_id']);
            $table->dropColumn('parentable_type');
            $table->dropColumn('parentable_id');
        });
    }
};
