<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ChauffeurController extends Controller
{
    public function index()
{
    $chauffeur = Auth::user();   
    $reservations = Reservation::where('statut', 'en_attente')
                                ->orderBy('heure_depart', 'asc')
                                ->with(['utilisateur'])
                                ->get();

    $taxis = $chauffeur->taxis;
    return view('chauffeur.home', compact('reservations', 'taxis'));
}
    
    
}
