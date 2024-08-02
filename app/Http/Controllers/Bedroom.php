<?php

namespace App\Http\Controllers;

use App\Models\FasilitasGedung;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Models\kamar;
use Illuminate\Support\Facades\Auth;

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
        $fasilitas = FasilitasGedung::all();
        $kamar->fasilitas_kamar = json_decode
        ($kamar->fasilitas_kamar, true);
            return inertia::render('Bedroom/BedroomDetail',[
                'data' => $kamar
            ]);
        
    }

    public function detailBedroomFromUser($id){
        $kamar = kamar::find($id);
        $fasilitas = FasilitasGedung::all();
        $kamar->fasilitas_kamar = json_decode
        ($kamar->fasilitas_kamar, true);
        return inertia::render('Partial/BedroomDetail',[
            'data' => $kamar  ,
            'fasilitas' => $fasilitas
        ]);
    }

    public function getCount(){
        return kamar::count();
    }

    public function Destroy($id){
        $bedroom =  kamar::find($id);
        $bedroom->delete();
        return redirect()->back();
    }



    public function store(Request $request)
    {
    // dd($request);
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif',
            'nama_kamar' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'panjang' => 'required|numeric',
            'lebar' => 'required|numeric',
            'tinggi' => 'required|numeric',
            'harga_bulan' => 'required|numeric',
            'harga_6bulan' => 'required|numeric',
            'harga_tahun' => 'required|numeric',
            'status' => 'required|string',
            'fasilitas' => 'required|array',
        ]);
    
        $image = $request->file('file');
        if ($image) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $filename, 'public');

            $kamar = new Kamar();
            $kamar->nama_kamar = $request->nama_kamar;
            $kamar->kode_kamar = Str::random(5);
            $kamar->deskripsi = $request->deskripsi;
            $kamar->harga_bulan = $request->harga_bulan;
            $kamar->harga_6bulan = $request->harga_6bulan;
            $kamar->harga_tahun = $request->harga_tahun;
            $kamar->status_kamar = $request->status;
            $kamar->panjang = $request->panjang;
            $kamar->lebar = $request->lebar;
            $kamar->tinggi = $request->tinggi;
            $kamar->path = $path ?? ' '; // Save the path to the database
            $kamar->fasilitas_kamar = json_encode($request->fasilitas);
            $kamar->save();
            return redirect()->back()->with('success', 'Data kamar berhasil ditambahkan.');
        } else {
            dd('gak ada');

            return redirect()->back()->with('error', 'File gambar tidak ditemukan atau tidak valid.');
        }

        }
    }
    


    // Redirect atau respons sesuai kebutuhan aplikasi Anda



