<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\kamar;
class Bedroom extends Controller
{
    //
    public function index(){
        $isExist =(bool) $this->getCount() ;
        $dataAll = kamar::all();
        // dd($isExist);
        return inertia::render('Bedroom' , 
        [
            'isExist' => $isExist ,
            'dataAll' => $dataAll
        ]);
    }

    public function detail($id){
        $kamar = kamar::find($id);
        dd($kamar);
        return inertia::render('BedroomDetail',[
            'data' => $kamar
        ]);
    }

    public function getCount(){
        return kamar::count();
    }




    public function store(Request $request)
    {
    dd($request);
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_kamar' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'panjang' => 'required|numeric',
            'lebar' => 'required|numeric',
            'tinggi' => 'required|numeric',
            'harga' => 'required|numeric',
            'status' => 'required|string',
            'fasilitas' => 'required|array',
        ]);
    
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageBinary = file_get_contents($image->getRealPath());
    
            $kamar = Kamar::create([
                'foto' => $imageBinary,
                'nama_kamar' => $request->input('nama_kamar'),
                'deskripsi' => $request->input('deskripsi'),
                'panjang' => $request->input('panjang'),
                'lebar' => $request->input('lebar'),
                'tinggi' => $request->input('tinggi'),
                'harga_kamar' => $request->input('harga'),
                'status_kamar' => $request->input('status'),
                'fasilitas_kamar' => json_encode($request->input('fasilitas')),
            ]);
    
            return redirect()->route('home')->with('success', 'Kamar berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'File gambar tidak ditemukan atau tidak valid.');
        }
    }
    


    // Redirect atau respons sesuai kebutuhan aplikasi Anda


}
