<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use Carbon\Carbon;
class AdminController extends Controller
{
  



    public function index()
    {
        // Fetch user count per month for passagers and chauffeurs
        $passagerData = User::where('role', 'passager')
                            ->selectRaw('COUNT(*) as count, MONTH(created_at) as month')
                            ->groupBy('month')
                            ->pluck('count', 'month');

        $chauffeurData = User::where('role', 'chauffeur')
                             ->selectRaw('COUNT(*) as count, MONTH(created_at) as month')
                             ->groupBy('month')
                             ->pluck('count', 'month');

        // Ensure data for all months are represented
        $months = collect(range(1, 12));
        $passagerData = $months->mapWithKeys(function ($month) use ($passagerData) {
            return [$month => $passagerData->get($month, 0)];
        });

        $chauffeurData = $months->mapWithKeys(function ($month) use ($chauffeurData) {
            return [$month => $chauffeurData->get($month, 0)];
        });

        return view('admin.home', compact('passagerData', 'chauffeurData'));
    }








    public function allChauffeurs()
    {
         $chauffeurs = User::where('role', 'chauffeur')->get();
         return view('admin.allchauffeurs', compact('chauffeurs'));
    }



    public function profil()
    {
        $user = Auth::user(); // Assuming the admin is authenticated
        return view('admin.profil', compact('user'));
    }


    public function deleteChauffeur($id)
    {
        // Find the chauffeur by ID and delete it
        $chauffeur = User::where('role', 'chauffeur')->findOrFail($id);
        $chauffeur->delete();

        // Redirect back with a success message
        return redirect()->route('admin.chauffeurs')->with('success', 'Chauffeur deleted successfully.');
    }


    public function editChauffeur($id)
    {
        $chauffeur = User::where('role', 'chauffeur')->findOrFail($id);
        return view('admin.editchauffeur', compact('chauffeur'));
    }

    // Method to update a chauffeur
    public function updateChauffeur(Request $request, $id)
    {
        $chauffeur = User::where('role', 'chauffeur')->findOrFail($id);
    
        try {
            // Validate the request
            $request->validate([
                'CNI' => 'required|unique:users,CNI,' . $chauffeur->id,
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $chauffeur->id,
                'datenaissance' => 'required|date',
                'lieu' => 'required|string|max:255',
            ]);
    
            // Update the chauffeur
            $chauffeur->update([
                'CNI' => $request->CNI,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'datenaissance' => $request->datenaissance,
                'lieu' => $request->lieu,
            ]);
    
            return redirect()->route('admin.chauffeurs')->with('success', 'Chauffeur updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating chauffeur: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to update chauffeur. Please try again.']);
        }
}
}
