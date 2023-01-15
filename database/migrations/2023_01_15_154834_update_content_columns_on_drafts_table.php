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
            $table->dropColumn('slug');
            $table->dropColumn('old_name');
            $table->dropColumn('new_name');
            $table->dropColumn('old_summary');
            $table->dropColumn('new_summary');
            $table->dropColumn('old_instructions');
            $table->dropColumn('new_instructions');
            $table->dropColumn('old_resources');
            $table->dropColumn('new_resources');
            $table->dropColumn('old_review');
            $table->dropColumn('new_review');
            $table->dropColumn('old_exercises');
            $table->dropColumn('new_exercises');

            $table->string('name')->nullable()->after('assignment_id');
            $table->text('summary')->nullable()->after('name');
            $table->longText('instructions')->nullable()->after('summary');
            // resources are now a one to many relationship
            $table->text('review')->nullable()->after('instructions');
            $table->text('exercises')->nullable()->after('review');
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
            $table->dropColumn('name');
            $table->dropColumn('summary');
            $table->dropColumn('instructions');
            $table->dropColumn('review');
            $table->dropColumn('exercises');

            $table->string('slug')->after('assignment_id');
            $table->string('old_name')->nullable()->after('slug');
            $table->string('new_name')->nullable()->after('old_name');
            $table->text('old_summary')->nullable()->after('new_name');
            $table->text('new_summary')->nullable()->after('old_summary');
            $table->longText('old_instructions')->nullable()->after('new_summary');
            $table->longText('new_instructions')->nullable()->after('old_instructions');
            $table->text('old_resources')->nullable()->after('new_instructions');
            $table->text('new_resources')->nullable()->after('old_resources');
            $table->text('old_review')->nullable()->after('new_resources');
            $table->text('new_review')->nullable()->after('old_review');
            $table->text('old_exercises')->nullable()->after('new_review');
            $table->text('new_exercises')->nullable()->after('old_exercises');
        });
    }
};
