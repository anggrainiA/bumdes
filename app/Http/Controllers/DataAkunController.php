<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataAkunController extends Controller
{
    public function index(){
        return view('fitur.akun');
    }
}
