<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Http\Request;

class PassagerController extends Controller
{
    public function index()
    {
        $passager = Auth::user();   

        if ($passager->role == "passager") {
            return view('passager.home', compact('passager'));
        } else {
            return view('unauthorized');
        }
    }

    public function profil()
    {
        $user = Auth::user(); // Assuming the user is authenticated

        if ($user->role == "passager") {
            return view('passager.profil', compact('user'));
        } else {
            return view('unauthorized');
        }
    }

    public function LaisserAvis()
    {
        if (Auth::user()->role == "passager") {
            return view('passager.LaisserAvis');
        } else {
            return view('unauthorized');
        }
    }

    public function reservations()
    {
        $utilisateur_id = Auth::id();
        $passager = Auth::user();   

        if ($passager->role == "passager") {
            $reservations = Reservation::where('utilisateur_id', $utilisateur_id)
                ->orderBy('heure_depart', 'asc')
                ->get();

            return view('passager.reservations', compact('reservations'));
        } else {
            return view('unauthorized');
        }
    }

    public function cancelReservation($id)
    {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->utilisateur_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($reservation->statut === 'en_attente') {
            $reservation->statut = 'annulee';
            $reservation->save();
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
        if (Auth::user()->role == "passager") {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'rating' => 'required|integer|between:1,5',
                'review' => 'required|string',
            ]);

            $review = new Review;
            $review->name = $validatedData['name'];
            $review->rating = $validatedData['rating'];
            $review->review = $validatedData['review'];
            $review->save();

            return redirect()->route('passager.avis')->with('success', 'Thank you for your feedback!');
        } else {
            return view('unauthorized');
        }
    }
}
