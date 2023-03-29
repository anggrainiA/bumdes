<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsahaJasaModel;
use Illuminate\Support\Str;
class UsahaJasaController extends Controller
{
    public function tambahusahajasa(Request $request){
         $request->validate([
            'namajasa' => ['required'],
            'alamatjasa' => ['required'],
        ]);
        $data=UsahaJasaModel::create([
            'id'=> Str::random(30),
            'namausaha' => $request->namajasa,
            'lokasiusaha' => $request->alamatjasa,
        ]);
        return back();
    }
}
