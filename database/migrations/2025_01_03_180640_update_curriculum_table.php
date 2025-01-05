<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This will drop the specified columns from the 'curriculum' table.
     */
    public function up(): void
    {
        Schema::table('curriculum', function (Blueprint $table) {
            $table->dropColumn([
                'cur_subject_code',
                'cur_subject_semester',
                'cur_subject_description',
                'cur_subject_units',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     * This will add the removed columns back to the 'curriculum' table.
     */
    public function down(): void
    {
        Schema::table('curriculum', function (Blueprint $table) {
            $table->string('cur_subject_code');
            $table->string('cur_subject_semester');
            $table->string('cur_subject_description');
            $table->integer('cur_subject_units');
        });
    }
};
