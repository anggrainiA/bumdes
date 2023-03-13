<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
         $credential=$request->validate([
            'nama'=>'required|string', 
            'password'=> 'required|string'
        ]);//wajib di isi
         if (Auth::attempt($credential)) {
           
            $request->session()->regenerate(); //generate ulang session untuk alasan keamanan (session fixation)
       
            return redirect()->intended('/Dashboard'); // menggunakan intended agar melewati middleware
        }

        return back()->with('LoginFailed', 'Email atau password salah');
    }
      public function logout(Request $request){

        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/');
    } 
}
