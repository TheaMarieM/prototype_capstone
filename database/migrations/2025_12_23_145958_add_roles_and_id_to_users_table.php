<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add ID Number (nullable for now to prevent errors with existing users)
            $table->string('identity_number')->unique()->nullable()->after('name');
            // Add Role
            $table->string('role')->default('student')->after('identity_number');
            // Make email optional
            $table->string('email')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['identity_number', 'role']);
            $table->string('email')->nullable(false)->change();
        });
    }
};
