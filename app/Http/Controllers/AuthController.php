<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'CNI' => 'required|string|max:20',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'datenaissance' => 'required|date',
            'lieu' => 'required|string|max:255',
            'role' => 'required|string|in:admin,chauffeur,passager',
        ]);

        $user = new User();
        $user->CNI = $request->CNI;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->datenaissance = $request->datenaissance;
        $user->lieu = $request->lieu;
        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Register successfully');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.home')->with('success', 'Login Success');
            } elseif ($user->role === 'chauffeur') {
                return redirect()->route('chauffeur.home')->with('success', 'Login Success');
            } else {
                return redirect()->route('home')->with('success', 'Login Success');
            }
        }

        return back()->with('error', 'Error Email or Password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}


















