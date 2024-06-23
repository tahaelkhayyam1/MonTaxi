<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Taxi;
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





    public function viewChauffeur($id)
    {
        $chauffeur = User::where('role', 'chauffeur')->with('taxis')->findOrFail($id);

        return view('admin.viewChauffeur', compact('chauffeur'));
    }

    public function allChauffeurs()
    {
        $chauffeurs = User::where('role', 'chauffeur')->with('taxis')->get();
        return view('admin.allchauffeurs', compact('chauffeurs'));
    }

    public function profil()
    {
        $user = Auth::user();  
        return view('admin.profil', compact('user'));
    }

    public function deleteChauffeur($id)
    {
        // Find the chauffeur by ID and delete it
        $chauffeur = User::where('role', 'chauffeur')->findOrFail($id);

        // Delete the chauffeur's taxis
        $chauffeur->taxis()->delete(); // Assumes taxis are related through a 'taxis' relationship

        // Delete the chauffeur
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

        // Validate the request
        $request->validate([
            'CNI' => 'required|unique:users,CNI,' . $chauffeur->id,
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $chauffeur->id,
            'datenaissance' => 'required|date',
            'lieu' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:20',
        ]);

        // Update the chauffeur
        $chauffeur->CNI = $request->CNI;
        $chauffeur->nom = $request->nom;
        $chauffeur->prenom = $request->prenom;
        $chauffeur->email = $request->email;
        $chauffeur->datenaissance = $request->datenaissance;
        $chauffeur->lieu = $request->lieu;
        $chauffeur->phonenumber = $request->phonenumber;
        $chauffeur->save();

        return redirect()->route('admin.chauffeurs')->with('success', 'Chauffeur updated successfully.');
    }


    public function affecterTaxiForm($id)
    {
        $chauffeur = User::findOrFail($id); // Assuming Chauffeur model and database structure

        return view('admin.affecter_taxi_form', compact('chauffeur'));
    }
 
    public function storeTaxiAssignment(Request $request, $id)
    {
        $chauffeur = User::findOrFail($id);

        $taxi = new Taxi();
        $taxi->marque = $request->marque;
        $taxi->model_year = $request->model_year;
        $taxi->plate = $request->plate;
        $taxi->color = $request->color;

        // Save taxi to chauffeur
        $chauffeur->taxis()->save($taxi);

        return redirect()->route('admin.chauffeurs.view', ['id' => $chauffeur->id])->with('success', 'Taxi affecté avec succès.');
    }

    public function createChauffeur()
    {
        return view('admin.createchauffeur');
    }
    public function storeChauffeur(Request $request)
    {
        // Validate the request
        $request->validate([
            // Chauffeur validation
            'CNI' => 'required|unique:users,CNI',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'datenaissance' => 'required|date',
            'lieu' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:20',
            // Taxi validation
            'marque' => 'required|string|max:255',
            'model_year' => 'required|integer',
            'plate' => 'required|string|max:255|unique:taxis,plate',
            'color' => 'required|string|max:255',
        ]);

        // Create the chauffeur
        $chauffeur = new User();
        $chauffeur->CNI = $request->CNI;
        $chauffeur->nom = $request->nom;
        $chauffeur->prenom = $request->prenom;
        $chauffeur->email = $request->email;
        $chauffeur->password = Hash::make($request->password);
        $chauffeur->datenaissance = $request->datenaissance;
        $chauffeur->lieu = $request->lieu;
        $chauffeur->role = 'chauffeur';
        $chauffeur->phonenumber = $request->phonenumber;
        $chauffeur->save();

        // Create the taxi
        $taxi = new Taxi();
        $taxi->marque = $request->marque;
        $taxi->model_year = $request->model_year;
        $taxi->plate = $request->plate;
        $taxi->color = $request->color;
        $taxi->user_id = $chauffeur->id;
        $taxi->save();

        return redirect()->route('admin.chauffeurs')->with('success', 'Chauffeur et taxi ajoutés avec succès.');
    }
}
