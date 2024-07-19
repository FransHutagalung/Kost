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
    // dd($request);
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
    
        $image = $request->file('file');
        if ($image) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $filename, 'public');

            $kamar = new Kamar();
            $kamar->nama_kamar = $request->nama_kamar;
            $kamar->deskripsi = $request->deskripsi;
            $kamar->harga_kamar = $request->harga;
            $kamar->status_kamar = $request->status;
            $kamar->panjang = $request->panjang;
            $kamar->lebar = $request->lebar;
            $kamar->tinggi = $request->tinggi;
            $kamar->path = $path; // Save the path to the database
            $kamar->fasilitas_kamar = json_encode($request->fasilitas);
            $kamar->save();
            return back()->with('success', 'Kamar berhasil ditambahkan.');
        } else {

            return redirect()->back()->with('error', 'File gambar tidak ditemukan atau tidak valid.');
        }

        }
    }
    


    // Redirect atau respons sesuai kebutuhan aplikasi Anda



