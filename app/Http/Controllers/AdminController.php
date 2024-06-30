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
        $user = Auth::user();
        if ($user->role == "admin") {
            $passagerData = User::where('role', 'passager')
                ->selectRaw('COUNT(*) as count, MONTH(created_at) as month')
                ->groupBy('month')
                ->pluck('count', 'month');

            $chauffeurData = User::where('role', 'chauffeur')
                ->selectRaw('COUNT(*) as count, MONTH(created_at) as month')
                ->groupBy('month')
                ->pluck('count', 'month');

            $months = collect(range(1, 12));
            $passagerData = $months->mapWithKeys(function ($month) use ($passagerData) {
                return [$month => $passagerData->get($month, 0)];
            });

            $chauffeurData = $months->mapWithKeys(function ($month) use ($chauffeurData) {
                return [$month => $chauffeurData->get($month, 0)];
            });

            return view('admin.home', compact('passagerData', 'chauffeurData'));
        } else {
            return view('unauthorized');
        }
    }

    public function viewChauffeur($id)
    {
        $user = Auth::user();
        if ($user->role == "admin") {
            $chauffeur = User::where('role', 'chauffeur')->with('taxis')->findOrFail($id);

            return view('admin.viewChauffeur', compact('chauffeur'));
        } else {
            return view('unauthorized');
        }
    }

    public function allChauffeurs()
    {
        $user = Auth::user();
        if ($user->role == "admin") {
            $chauffeurs = User::where('role', 'chauffeur')->with('taxis')->get();
            return view('admin.allchauffeurs', compact('chauffeurs'));
        } else {
            return view('unauthorized');
        }
    }

    public function profil()
    {
        $user = Auth::user();
        if ($user->role == "admin") {
            return view('admin.profil', compact('user'));
        } else {
            return view('unauthorized');
        }
    }

    public function deleteChauffeur($id)
    {
        $user = Auth::user();
        if ($user->role == "admin") {
            $chauffeur = User::where('role', 'chauffeur')->findOrFail($id);

            $chauffeur->taxis()->delete();

            $chauffeur->delete();

            return redirect()->route('admin.chauffeurs')->with('success', 'Chauffeur deleted successfully.');
        } else {
            return view('unauthorized');
        }
    }

    public function editChauffeur($id)
    {
        $user = Auth::user();
        if ($user->role == "admin") {
            $chauffeur = User::where('role', 'chauffeur')->findOrFail($id);
            return view('admin.editchauffeur', compact('chauffeur'));
        } else {
            return view('unauthorized');
        }
    }

    public function updateChauffeur(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->role == "admin") {
            $chauffeur = User::where('role', 'chauffeur')->findOrFail($id);

            $request->validate([
                'CNI' => 'required|unique:users,CNI,' . $chauffeur->id,
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $chauffeur->id,
                'datenaissance' => 'required|date',
                'lieu' => 'required|string|max:255',
                'phonenumber' => 'required|string|max:20',
            ]);

            $chauffeur->CNI = $request->CNI;
            $chauffeur->nom = $request->nom;
            $chauffeur->prenom = $request->prenom;
            $chauffeur->email = $request->email;
            $chauffeur->datenaissance = $request->datenaissance;
            $chauffeur->lieu = $request->lieu;
            $chauffeur->phonenumber = $request->phonenumber;
            $chauffeur->save();

            return redirect()->route('admin.chauffeurs')->with('success', 'Chauffeur updated successfully.');
        } else {
            return view('unauthorized');
        }
    }

    public function affecterTaxiForm($id)
    {
        $user = Auth::user();
        if ($user->role == "admin") {
            $chauffeur = User::findOrFail($id);

            return view('admin.affecter_taxi_form', compact('chauffeur'));
        }
    }

    public function storeTaxiAssignment(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->role == "admin") {
            $chauffeur = User::findOrFail($id);

            $taxi = new Taxi();
            $taxi->marque = $request->marque;
            $taxi->model_year = $request->model_year;
            $taxi->plate = $request->plate;
            $taxi->color = $request->color;

            $chauffeur->taxis()->save($taxi);

            return redirect()->route('admin.chauffeurs.view', ['id' => $chauffeur->id])->with('success', 'Taxi affecté avec succès.');
        } else {
            return view('unauthorized');
        }
    }

    public function createChauffeur()
    {
        $user = Auth::user();
        if ($user->role == "admin") {
            return view('admin.createchauffeur');
        } else {
            return view('unauthorized');
        }
    }

    public function storeChauffeur(Request $request)
    {
        $user = Auth::user();
        if ($user->role == "admin") {
            $request->validate([
                'CNI' => 'required|unique:users,CNI',
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8',
                'datenaissance' => 'required|date',
                'lieu' => 'required|string|max:255',
                'phonenumber' => 'required|string|max:20',
                'marque' => 'required|string|max:255',
                'model_year' => 'required|integer',
                'plate' => 'required|string|max:255|unique:taxis,plate',
                'color' => 'required|string|max:255',
            ]);

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

            $taxi = new Taxi();
            $taxi->marque = $request->marque;
            $taxi->model_year = $request->model_year;
            $taxi->plate = $request->plate;
            $taxi->color = $request->color;
            $taxi->user_id = $chauffeur->id;
            $taxi->save();

            return redirect()->route('admin.chauffeurs')->with('success', 'Chauffeur et taxi ajoutés avec succès.');
        } else {
            return view('unauthorized');
        }
    }
}
