<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengelola;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

class PengelolaController extends Controller
{
    public function index(){
        $data=Pengelola::all();
        return view('fitur.pengelola',compact('data'));
    }
    public function tambah(Request $request){
        
        $request->validate([
            'nama' => ['required'],
            'password' => ['required'],
            'nohp' => ['required'],
            'status' => ['required'],
        ]);
        $data=Pengelola::create([
            'id'=> Str::random(30),
            'nama'=> $request->nama,
            'password'=> Hash::make($request->password),
            'no_telp'=> $request->nohp,
            'status'=> $request->status
        ]);
        return back();
    }
    public function edit(Request $request){
        $request->validate([
            'nama' => ['required'],
            'password' => ['required'],
            'nohp' => ['required'],
            'status' => ['required'],
        ]);
        $data=Pengelola::where('id',$request->id)->update([
            'nama'=> $request->nama,
            'password'=> Hash::make($request->password),
            'no_telp'=> $request->nohp,
            'status'=> $request->status]);
        return back();
    }
    public function delete($id){
        // dd($id);
        Pengelola::destroy($id);
        return back();
         
    }
}
