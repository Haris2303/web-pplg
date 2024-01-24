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
        Schema::create('subjects_has_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('class_id');
            $table->primary(['subject_id', 'class_id']);
            $table->foreign('subject_id')->on('subjects')->references('id');
            $table->foreign('class_id')->on('classes')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects_has_classes');
    }
};
