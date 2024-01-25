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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->dateTime('datetime');
            $table->enum('status', ['hadir', 'sakit', 'izin']);
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('class_id');
            $table->timestamps();
            $table->foreign('student_id')->on('students')->references('id');
            $table->foreign('subject_id')->on('subjects')->references('id');
            $table->foreign('teacher_id')->on('teachers')->references('id');
            $table->foreign('class_id')->on('classes')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
