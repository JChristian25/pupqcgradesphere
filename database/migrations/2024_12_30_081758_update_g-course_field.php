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
        Schema::table('gradesheets', function (Blueprint $table) {
            $table->string('g_course_code')->nullable()->change();
            $table->string('g_course_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gradesheets', function (Blueprint $table) {
            $table->string('g_course_code')->nullable(false)->change();
            $table->string('g_course_description')->nullable(false)->change();
        });
    }
};
