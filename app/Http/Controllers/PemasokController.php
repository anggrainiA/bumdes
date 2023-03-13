<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasok;

class PemasokController extends Controller
{
    public function pemasok()
{
    return view('fitur.pemasok', ['data' => Pemasok::latest()->get()]);
}
    public function store(Request $request)
{
    // dd($request);
    $validatedData = $request->validate([
        'nama' => 'required|max:255',
        'alamat' =>'required',
        'kontak' => 'required',
    ]);


    // $validatedData['id_pemasok']= auth()->user()->id;
    Pemasok::create($validatedData);

    return redirect()->route('pemasok')->with('success', 'Data Pemasok berhasil ditambahkan.');
    }

    public function update(Request $request, Pemasok $pemasok){

    $validatedData = $request->validate([
        'nama' => 'required|max:255',
        'alamat' =>'required',
        'kontak' => 'required',
    ]);

    // dd($request);
    // $validatedData['id_pemasok']= auth()->user()->id;
    Pemasok::where('id', $pemasok->id)->update($validatedData);

    return redirect('/pemasok')->with('success', 'Data Pemasok berhasil diupdate.');
    }

    public function destroy(Pemasok $pemasok){
        Pemasok::destroy($pemasok->id);
        return redirect('/pemasok')->with('success', 'Pemasok berhasil dihapus!.');
    }

    public function show($id){
        // dd($pemasok);
        $pemasok = Pemasok::find($id);
        // $loc = "Lokasi Pemasok";
        return view('fitur.detil.pemasok', [
            'pemasok' =>Pemasok::find($id)
        ]);

    }
}

