<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** * CRITICAL FIX: 
     * You must put this line here to enable the factory() method 
     */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'identity_number', 
        'role',
        'email', // Keep this just in case, even if optional
        'password',
    ];

    // Helper to check if user is Admin (Discipline Chair)
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}