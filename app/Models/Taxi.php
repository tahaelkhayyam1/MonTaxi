<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'marque', 
        'model_year', 
        'plate', 
        'color', 
        'user_id'
    ];

    /**
     * Get the user that owns the taxi.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'vehicule_id');
    }
}
