<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilBumdes;

class sidebarController extends Controller
{
     public function index(){
        $data=ProfilBumdes::All();
        return view('template.sidebar',compact('data'));
    }
}
