<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    protected $table = 'proker';
    protected $fillable = [
     'id', 'nama', 'tanggal','lokasi', 'ranting_id','status'
    ];
 	
    public function ranting(){
        return $this->belongsTo('\App\Ranting', 'ranting_id');
    }
}
