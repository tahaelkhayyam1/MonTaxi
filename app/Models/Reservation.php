<?php

 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $primaryKey = 'reservation_id';
    public $timestamps = false; // Disable timestamps
    protected $fillable = [
        'user_id',
        'lieu_depart',
        'lieu_arrivee',
        'heure_depart',
        'statut',
        'tarif',
    ];

    protected $casts = [
        'heure_depart' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
