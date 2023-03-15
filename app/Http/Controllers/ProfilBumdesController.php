<?php

namespace App\Http\Controllers;
use App\Models\ProfilBumdes;
use App\Models\Pengelola;
use Illuminate\Http\Request;

class ProfilBumdesController extends Controller
{
    public function index(){
        $data=ProfilBumdes::all();
        $ketua=Pengelola::where('status', 'Ketua')->orWhere('status','Bendahara')->get();
        return view('fitur.profilbumdes',compact('data','ketua'));
    }
    public function update(Request $request){
        $request->validate([
            'nama' => ['required'],
            'alamat' => ['required'],
            'no_ketua' => ['required'],
            'no_bendahara' => ['required'],
        ]);
        $noK=$request->no_ketua;
        $noB=$request->no_bendahara;

        ProfilBumdes::where('id',$request->id)->update([
            'nama'=> $request->nama,
            'alamat'=> $request->alamat ]);
        Pengelola::where('id', $request->id_ketua)->update([
            'no_telp'=> $request->no_ketua
        ]);    
        Pengelola::where('id', $request->id_bendahara)->update([
            'no_telp'=> $request->no_bendahara
        ]);
        
        return back();
    }
    public function updateGambar(Request $request, $id){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $bumdes = ProfilBumdes::find($id);

     if($request->file != ''){        
          $path = public_path().'/images/upload/';

          //code for remove old file
          if($bumdes->file != ''  && $bumdes->file != null){
               $file_old = $path.$bumdes->file;
               unlink($file_old);
          }

          //upload new file
          $file = $request->file;
          $filename = $file->getClientOriginalName();
          $file->move($path, $filename);

          //for update in table
          $bumdes->update(['foto' => $filename]);
          return back();
     }
}
}
