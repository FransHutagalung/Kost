<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;
    protected $table = 'kamar';
    protected $guarded = ['id'];

    protected $fillable = [
        'nama_kamar' ,
        'status_kamar' , 
        'fasilitas_kamar' ,
        'panjang' ,
        'lebar' , 
        'tinggi',
        'harga_kamar', 

    ];

    public function getAll(){
        return $this->all();
    }

    public function getKamar($id){
        return $this->find($id ,);
    }

}
