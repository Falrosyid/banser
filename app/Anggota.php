<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    //
    protected $table = 'anggota';
    protected $fillable = [
     'id', 'user_id', 'id_anggota','nama_anggota', 'ranting_id','ttl','alamat','jabatan','seragam','no_hp', 'diklat' ,'foto'
    ];
 	
    public function ranting(){
        return $this->belongsTo('\App\Ranting');
    }
}
