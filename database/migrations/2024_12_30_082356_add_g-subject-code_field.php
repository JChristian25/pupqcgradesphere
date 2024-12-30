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
            $table->string('g_subject_code'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gradesheets', function (Blueprint $table) {
            $table->dropColumn('g_subject_code');
        });
    }
};
