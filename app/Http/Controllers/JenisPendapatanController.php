<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPendapatan;
use App\Models\UsahaJasaModel;

use Illuminate\Support\Str;
class JenisPendapatanController extends Controller
{
    public function tambah(Request $request){
       
         $request->validate([
            'jenis' => ['required']
        ]);
        $data=JenisPendapatan::create([
            'id'=> Str::random(30),
            'id_transaksi'=>$request->id,
            'namajenispendapatan' => $request->jenis
        ]);
      
        return back();
    }
    public function delete(Request $request, $id){
        
        $data=UsahaJasaModel::leftjoin('jenispendapatan', 'jenispendapatan.id_transaksi', '=', 'usaha.id')->delete();
      
        // $data=JenisPendapatan::create([
        //     'id'=> Str::random(30),
        //     'idjasa'=>$id,
        //     'namajenispendapatan' => $request->jenis
        // ]);
        return back();
    }
}
