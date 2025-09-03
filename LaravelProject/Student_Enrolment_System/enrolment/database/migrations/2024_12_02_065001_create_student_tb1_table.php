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
        Schema::create('student_tb1', function (Blueprint $table) {
            $table->increments('student_id');
            $table->string('student_name');
            $table->string('student_roll');
            $table->string('student_fathersname');
            $table->string('student_mothersname');
            $table->string('student_email');
            $table->string('student_phone');
            $table->string('student_address');
            $table->string('student_image');
            $table->string('student_password');
            $table->string('student_department');
            $table->string('student_admissionyear');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_tb1');
    }
};
