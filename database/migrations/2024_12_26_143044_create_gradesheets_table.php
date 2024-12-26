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
        Schema::create('gradesheets', function (Blueprint $table) {
            $table->id();
            
            $table->string('g_subject');
            $table->string('g_subject_semester')->nullable();
            $table->string('g_subject_units')->nullable();
            
            $table->string('g_course_code');
            $table->string('g_course_description');

            $table->string('year_and_section');
            $table->string('block_time');
            $table->string('block_room');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradesheets');
    }
};
