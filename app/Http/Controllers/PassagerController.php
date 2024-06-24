<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

 class PassagerController extends Controller
{
    public function profil()
    {
        $user = Auth::user(); // Assuming the admin is authenticated
        return view('passager.profil', compact('user'));
    }





    public function reservations()
{
    $utilisateur_id = Auth::id();
    
     $reservations = Reservation::where('utilisateur_id', $utilisateur_id)
                                 ->orderBy('heure_depart', 'asc')
                                ->get();

    return view('passager.reservations', compact('reservations'));
}


public function cancelReservation($id)
{
    $reservation = Reservation::findOrFail($id);

    // Check if the reservation belongs to the authenticated user
    if ($reservation->utilisateur_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    // Only cancel reservations with status 'en_attente'
    if ($reservation->statut === 'en_attente') {
        $reservation->statut = 'annulee';
        $reservation->save();
        // Optionally, redirect back with a success message
        return redirect()->back()->with('status', 'Reservation annulée avec succès.');
    }

    return redirect()->back()->withErrors('Impossible d\'annuler cette réservation.');
}
}
