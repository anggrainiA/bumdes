<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilBumdes;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('fitur.dashboard');
    }
}
