<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class PassagerController extends Controller
{
    public function profil()
    {
        $user = Auth::user(); // Assuming the admin is authenticated
        return view('passager.profil', compact('user'));
    }

}
