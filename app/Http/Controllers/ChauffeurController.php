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
    
        if ($chauffeur->role == "chauffeur") {
            $reservations = Reservation::where('statut', 'en_attente')
                                        ->orderBy('heure_depart', 'asc')
                                        ->with(['utilisateur'])
                                        ->get();
    
            $taxis = $chauffeur->taxis;
            return view('chauffeur.home', compact('reservations', 'taxis'));
        } else {
            return view('unauthorized');
        }
    }
    
    public function profil()
    {
        $user = Auth::user(); // Assuming the admin is authenticated

        if ($user->role == "chauffeur") {
            return view('chauffeur.profil', compact('user'));
        } else {
            return view('unauthorized');
        }
    }

    public function prendreCourse(Request $request, $reservation_id)
    {
        // Validate the incoming request
        $request->validate([
            'selected_taxi' => 'required|exists:taxis,id',
        ]);

        $chauffeur = Auth::user();

        if ($chauffeur->role == "chauffeur") {
            // Fetch the reservation
            $reservation = Reservation::findOrFail($reservation_id);

            // Update the reservation with the chauffeur_id, vehicule_id and change status to 'encours'
            $reservation->chauffeur_id = $chauffeur->id;
            $reservation->vehicule_id = $request->input('selected_taxi');
            $reservation->statut = 'encours';

            try {
                $reservation->save();
                return redirect()->back()->with('success', 'Reservation taken successfully!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to take reservation: ' . $e->getMessage());
            }
        } else {
            return view('unauthorized');
        }
    }

    public function mesCourses()
    {
        $chauffeur = Auth::user();

        if ($chauffeur->role == "chauffeur") {
            // Fetch reservations taken by the chauffeur with taxi details loaded
            $reservations = Reservation::with('utilisateur', 'taxi')
                ->where('chauffeur_id', $chauffeur->id)
                ->get();

            return view('chauffeur.mes_courses', compact('reservations'));
        } else {
            return view('unauthorized');
        }
    }






    
}
