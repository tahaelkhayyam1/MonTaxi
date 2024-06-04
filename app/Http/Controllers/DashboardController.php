<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role = $user->role;

        switch ($role) {
            case 'admin':
                return view('admin.home', compact('user'));
            case 'chauffeur':
                return view('dashboard.chauffeur', compact('user'));
            case 'passager':
                return view('dashboard.passager', compact('user'));
            default:
                return abort(403, 'Unauthorized action.');
        }
    }
}
