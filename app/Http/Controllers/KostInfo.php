<?php

namespace App\Http\Controllers;

use App\Models\FasilitasGedung;
use App\Models\infoKost;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KostInfo extends Controller
{
    //

    public function Show(){
        $kostInfo = infoKost::first();
        $kostFasilitas = FasilitasGedung::all();
        return Inertia::render('Kost/KostInfo',[
            'data' => $kostInfo , 
            'fasilitas' => $kostFasilitas
        ]);
    }

    public function Update(Request $request){
       $kost = infoKost::find($request->id); 
       $kost->nama_kost = $request->nama_kost;
       $kost->alamat = $request->alamat;
       $kost->no_telp = $request->no_telp;
       $kost->email = $request->email;
       $kost->luas_tanah = $request->luas_tanah;
       $kost->save();
       return redirect()->back()->with('success', 'Data Kost Update.');
    }

    public function DestroyFasilitas(Request $request){
        $fasilitas = FasilitasGedung::find($request->id);
        dd($fasilitas);
    }

    public function StoreFasilitas(Request $request){
        // dd($request);
        $fasilitas = new FasilitasGedung();
        $fasilitas->fasilitas_gedung = $request->fasilitas;
        $fasilitas->status = $request->status;
        $fasilitas->save();
        return redirect()->back()->with('success', 'Data Fasilitas Update.');
    }

}
