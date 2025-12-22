<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // ... existing code ...

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    // Helper to check if user is Admin (Discipline Chair)
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}