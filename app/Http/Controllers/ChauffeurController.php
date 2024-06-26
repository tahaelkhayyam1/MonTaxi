<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('statut', 'en_attente')
                                    ->orderBy('heure_depart', 'asc')
                                    ->with(['utilisateur' => function ($query) {
                                        $query->with('taxis');
                                    }])
                                    ->get();
    
        return view('chauffeur.home', compact('reservations'));
    }
    
}
