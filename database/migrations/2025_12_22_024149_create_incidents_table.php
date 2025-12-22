<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_incidents_table.php
public function up(): void
{
    Schema::create('incidents', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained()->onDelete('cascade');
        
        // Incident Details 
        $table->date('incident_date');
        $table->time('incident_time');
        $table->string('location');
        $table->string('violation_type'); // Bullying, Tardiness, etc.
        
        // Narrative Report (Scanned pictures, Optional) [cite: 257, 258]
        $table->string('narrative_image_path')->nullable();
        
        // Status & Sanctions [cite: 255]
        $table->string('status')->default('pending'); // pending, validated, closed
        $table->text('sanction')->nullable();
        
        $table->timestamps();
    });
}
};
