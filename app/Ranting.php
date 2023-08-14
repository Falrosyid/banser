<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranting extends Model
{
    protected $table = 'ranting';
    protected $fillable = ['nama'];

    // public function anggota(){
    //     return $this->belongsTo(Anggota::class);
    // }


}
