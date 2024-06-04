<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassagerController extends Controller
{
    public function index()
    {
        return view('passager.dashboard');
    }
}
