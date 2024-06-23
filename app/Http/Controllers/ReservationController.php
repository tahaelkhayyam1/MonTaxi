<?php
 
// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
 
    
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'from_destination' => 'required|string',
            'to_destination' => 'required|string',
            'tarif' => 'nullable|numeric',
            'datetime' => 'required|date_format:Y-m-d\TH:i', // Adjust format if necessary
        ]);
    
        // Assuming utilisateur_id is fetched from authenticated user
        $utilisateur_id = Auth::id();
    
        // Create reservation
        $reservation = new Reservation();
        $reservation->utilisateur_id = $utilisateur_id;
        $reservation->lieu_depart = $validatedData['from_destination'];
        $reservation->lieu_arrivee = $validatedData['to_destination'];
        $reservation->heure_depart = $validatedData['datetime'];
        $reservation->statut = 'en_attente'; // Default status
        $reservation->tarif = $validatedData['tarif']; // Optional, depending on your logic
    
        // Save reservation
        try {
            $reservation->save();
            // Handle any additional logic or redirect as needed
            return redirect()->back()->with('success', 'Reservation created successfully!');
        } catch (\Exception $e) {
            // Handle exception
            return redirect()->back()->with('error', 'Failed to create reservation: ' . $e->getMessage());
        }
    }
    }
    