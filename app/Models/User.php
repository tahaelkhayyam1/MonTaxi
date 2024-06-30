<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Define role constants
    const ROLE_PASSENGER = 'passenger';
    const ROLE_CHAUFFEUR = 'chauffeur';
    const ROLE_ADMIN = 'admin';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'CNI',            // National ID
        'nom',            // Last name
        'prenom',         // First name
        'email',          // Email address
        'password',       // Password
        'datenaissance',  // Date of birth
        'lieu',           // Place
        'phonenumber',    // Phone number
        'role',           // User role (passenger, chauffeur, admin)
    ];

    // Hidden attributes for arrays
    protected $hidden = [
        'password',       // Hide password
        'remember_token', // Hide remember token
    ];

    // Cast attributes to native types
    protected $casts = [
        'email_verified_at' => 'datetime', // Cast email_verified_at to datetime
    ];

    /**
     * Get the taxis associated with the user.
     */
    public function taxis()
    {
        return $this->hasMany(Taxi::class);
    }

    /**
     * Get the reservations associated with the user.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'utilisateur_id');
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
