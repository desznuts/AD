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
        Schema::create('student_enrollments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('studno')->on('students')->onUpdate('cascade')->onDelete('cascade');

            $table->date('enrollment_date');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('course_no')->on('courses')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('prog_id')->on('programs')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('major_id')->nullable();
            $table->foreign('major_id')->references('major_id')->on('majors')->onUpdate('cascade')->onDelete('cascade');

            $table->enum('yrlevel', ['1', '2', '3', '4']);

            $table->unsignedBigInteger('sy_id');
            $table->foreign('sy_id')->references('sy_id')->on('school_years')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('sem_id');
            $table->foreign('sem_id')->references('sem_id')->on('semesters')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_enrollments');
    }
};
