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
        Schema::table('transcripts', function (Blueprint $table) {
            if (!Schema::hasColumn('transcripts', 'code')) {
                $table->string('code')->after('id');
            }
            if (!Schema::hasColumn('transcripts', 'course_name')) {
                $table->string('course_name')->after('code');
            }
            if (!Schema::hasColumn('transcripts', 'sks')) {
                $table->integer('sks')->after('course_name');
            }
            if (!Schema::hasColumn('transcripts', 'grade')) {
                $table->string('grade')->nullable()->after('sks');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transcripts', function (Blueprint $table) {
            //
        });
    }
};
