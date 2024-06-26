<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'CNI',
        'nom',
        'prenom',
        'email',
        'password',
        'datenaissance',
        'lieu',
        'phonenumber',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the taxis for the user.
     */
    public function taxis()
    {
        return $this->hasMany(Taxi::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'utilisateur_id');
    }
}
