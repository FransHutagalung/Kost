<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;
    protected $table = 'kamar';
    protected $guarded = ['id'];

    public function getAll(){
        return $this->all();
    }

    public function getKamar($id){
        return $this->find($id ,);
    }

}
