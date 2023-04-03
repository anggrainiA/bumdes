<?php

namespace App\Http\Controllers;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Transaksi;
use App\Models\UsahaJasaModel;
use App\Models\Pelanggan;
use App\Models\Jasa;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TransaksiJasaController extends Controller
{
    public function index(){
       
        $pelanggan=Pelanggan::All();
        $usaha=UsahaJasaModel::All();
        // $transaksi= Transaksi::All();
        $transaksi=Jasa::join('transaksi', 'jasa.id', '=', 'transaksi.id_jasa')
                        ->join('pelanggans', 'transaksi.id_pelanggan', '=' ,'pelanggans.id')
                        ->join('usaha', 'jasa.id_usaha','=','usaha.id')->get();
        // dd($transaksi);
        return view('fitur.pendapatan', compact('pelanggan','usaha','transaksi'));
    }
    public function detail($id){
        $transaksi=Pelanggan::join('transaksi', 'transaksi.id_pelanggan', '=', 'pelanggans.id')->where('transaksi.id',$id)->get();
        return view('fitur.detil.notapendapatan', compact('transaksi'));
    }
    public function tambah(Request $request){
        
        $mytime = IdGenerator::generate(['table' => 'transaksi', 'length' => 10, 'prefix' =>date('d-m-y-')]);
        $id_jasa= Jasa::where('id_usaha', $request->usaha)->get('id');
        
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
            'id_jasa' =>$id_jasa[0]['id'],
            'id_pelanggan' => $request->pelanggan,
            'tanggal'=>$request->tanggal,
            'catatan'=> $request->catatan,
            'bukti'=> $request->filename
        ]);
        return back();
        }
    }
    public function updateGambar(Request $request, $id){

    }
    public function delete($id){
        Transaksi::destroy($id);
        return back();
         
    }
    public function editTransaksi(Request $request){
         $request->validate([
            'tanggal' => ['required'],
            'usaha' => ['required'],
            'pelanggan' => ['required'],
        ]);
        Transaksi::where('id',$request->id)->update([
            'tanggal'=> $request->tanggal,
            'nama_usaha'=> $request->usaha,
            'id_pelanggan'=> $request->pelanggan,
            'catatan'=> $request->catatan]);
        return back();
    }
}
