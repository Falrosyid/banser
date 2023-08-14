<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
     //
    protected $table = 'kegiatan';
    protected $fillable = [
     'id', 'nama', 'anggota_id','tanggal', 'ranting_id', 'lokasi','foto','keterangan'
    ];
 	
    public function ranting(){
        return $this->belongsTo('\App\Ranting');
    }
    public function anggota(){
        return $this->belongsTo('\App\Anggota');
    }
}
