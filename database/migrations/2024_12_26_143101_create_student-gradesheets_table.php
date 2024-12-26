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
        Schema::create('student_gradesheet', function (Blueprint $table) {
            $table->id();
            
            $table->integer('gradesheet_id');
            $table->integer('student_id');

            $table->string('first_grading');
            $table->string('second_grading');
            $table->string('final_rating');
            $table->string('remarks');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExiss('student_gradesheet');
    }
};
