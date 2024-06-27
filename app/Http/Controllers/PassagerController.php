<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Review;




class PassagerController extends Controller
{
    public function profil()
    {
        $user = Auth::user(); // Assuming the admin is authenticated
        return view('passager.profil', compact('user'));
    }


    public function LaisserAvis()
    {
         return view('passager.LaisserAvis');
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
    public function terminercourse($id)
    {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->utilisateur_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($reservation->statut === 'encours') {
            $reservation->statut = 'terminee';
            $reservation->save();
            return redirect()->back()->with('status', 'Reservation terminée avec succès.');
        }

        return redirect()->back()->withErrors('Impossible de terminer cette réservation.');
    }




    public function storeAvis(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string',
        ]);

        // Create a new review instance and save to the database
        $review = new Review;
        $review->name = $validatedData['name'];
        $review->rating = $validatedData['rating'];
        $review->review = $validatedData['review'];
        $review->save();

        // Redirect back with a success message
        return redirect()->route('passager.avis')->with('success', 'Thank you for your feedback!');
    }



}
