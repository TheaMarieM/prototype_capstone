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
        $table->string('student_id_number')->unique(); // e.g., 2025-001
        $table->string('first_name');
        $table->string('last_name');
        $table->string('grade_level'); // e.g., Grade 7
        $table->string('section');
        
        // Link to a User account (for student login) [cite: 260]
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
        
        // Link to an Adviser (User) [cite: 250]
        $table->foreignId('adviser_id')->nullable()->constrained('users')->onDelete('set null');
        
        $table->timestamps();
    });
}
};
