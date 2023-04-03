<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fitur.pelanggan', ['pelanggan' => Pelanggan::all()]);
        // return view('fitur.pelanggan', compact('data'));
    }

    public function store(Request $request)
    {
         // dd($request);
    $request->validate([
        'nama' => 'required|max:255',
        'alamat' =>'required',
        'kontak' => 'required',
    ]);
    $data= Pelanggan::create([
            'id'=> Str::random(30),
            'nama' => $request->nama,
            'alamat' =>$request->alamat,
            'kontak' => $request->kontak,
        ]);

    // $validatedData['id_pemasok']= auth()->user()->id;
    // Pelanggan::create($validatedData);

    return redirect('/pelanggan')->with('success', 'Data Pelanggan berhasil ditambahkan.');
    }


    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' =>'required',
            'kontak' => 'required',
        ]);


        // dd($request);
        // $validatedData['id_pemasok']= auth()->user()->id;
        Pelanggan::where('id', $pelanggan->id)->update($validatedData);

        return redirect('/pelanggan')->with('success', 'Data Pelanggan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        Pelanggan::destroy($pelanggan->id);
        return redirect('/pelanggan')->with('success', 'Pelanggan berhasil dihapus!.');
    }
}
