<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilBumdesController extends Controller
{
    public function index(){
        return view('fitur.pengelola');
    }
}
