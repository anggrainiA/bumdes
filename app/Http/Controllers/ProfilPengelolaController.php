<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilPengelolaController extends Controller
{
    public function index(){
        return view('fitur.profiluser');
    }

    public function update(Request $request, Pengelola $pengelola)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' =>'required',
            'no_telp' => 'required',
            'status' => 'required',
        ]);

        // dd($request);
        // $validatedData['id_pemasok']= auth()->user()->id;
        Pengelola::where('id', $pengelola->id)->update($validatedData);

        return redirect('/pengelola')->with('success', 'Data Pengelola berhasil diupdate.');
    }

}
