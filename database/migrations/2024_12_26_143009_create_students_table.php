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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('student_number');
            $table->string('student_fname');
            $table->string('student_mname')->nullable();
            $table->string('student_lname');
            $table->string('student_suffix')->nullable();

            $table->string('has_hscard')->nullable();
            $table->string('has_hscard')->nullable();
            $table->string('has_f137')->nullable();

            $table->string('honorable_dismissal')->nullable();
            $table->string('with_tor')->nullable();
            $table->string('with_diploma')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
