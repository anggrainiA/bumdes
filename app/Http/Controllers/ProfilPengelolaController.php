<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengelola;

class ProfilPengelolaController extends Controller
{
    public function index(){
        return view('fitur.profiluser');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' =>'required',
            'no_telp' => 'required',
        ]);

        // dd($request);
        // $validatedData['id_pemasok']= auth()->user()->id;
        Pengelola::where('id', Auth::user()->id)->update($validatedData);

        return back();
    }

    public function updateGambar(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $pengelola=Pengelola::find(Auth::user()->id);

    if($request->file !=''){
        $path =public_path().'/images/upload/';
        if($pengelola->file !='' && $pengelola->file != null){
            $file_old= $path.$pengelola->file;
            unlink($file_old);
        }

        //upload new file
        $file=$request->file;
        $filename=$file->getClientOriginalName();
        $file->move($path, $filename);

        //for update in table
        $pengelola->update (['foto'=>$filename]);
        return back();

    }

    }

}
