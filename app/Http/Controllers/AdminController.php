<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
 
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
}
