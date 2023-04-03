<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsahaJasaModel;
use App\Models\Jasa;
use Illuminate\Support\Str;
class UsahaJasaController extends Controller
{
    public function tambahusahajasa(Request $request){
       $id = Str::random(30);
         $request->validate([
            'namajasa' => ['required'],
            'alamatjasa' => ['required'],
        ]);
        UsahaJasaModel::create([
            'id'=> $id,
            'namausaha' => $request->namajasa,
            'lokasiusaha' => $request->alamatjasa,
        ]);
        Jasa::create([
            'id'=>Str::random(30),
            'id_usaha'=>$id
        ]);
        return back();
    }
}
