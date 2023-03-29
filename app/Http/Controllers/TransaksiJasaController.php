<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\UsahaJasaModel;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TransaksiJasaController extends Controller
{
    public function index(){
       
        $pelanggan=Pelanggan::All();
        $usaha=UsahaJasaModel::All();
        $transaksi= Transaksi::All();
        return view('fitur.pendapatan', compact('pelanggan','usaha','transaksi'));
    }
    public function tambah(Request $request){
        $i=1;
        $mytime = Carbon::now()->format('d-m-Y-') . $i;
        dd($mytime);
        $request->validate([
            'tanggal' => ['required'],
            'usaha' => ['required'],
            'pelanggan' => ['required'],
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->file !=''){
        $path =public_path().'/images/upload/';
        // if($pengelola->file !='' && $pengelola->file != null){
        //     $file_old= $path.$pengelola->file;
        //     unlink($file_old);
        // }

        // upload new file
        $file=$request->file;
        $filename=$file->getClientOriginalName();
        $file->move($path, $filename);

        $data=Transaksi::create([
            'id'=> $mytime,
            'nama_usaha' => $request->usaha,
            'nama_pelanggan' => $request->pelanggan,
            'tanggal'=>$request->tanggal,
            'catatan'=> $request->catatan,
            'bukti'=> $request->filename
        ]);
        $i=$i+1;
        return back();
        }
    }
    public function updateGambar(Request $request, $id){

    }
    public function editTransaksi(Request $request, $id){

    }
}
