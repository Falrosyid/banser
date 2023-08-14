<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
	protected $table = 'sertifikat';
	protected $fillable = [
		'id', 'nama', 'tanggal','tempat', 'foto', 'anggota_id'
	];

	public function anggota(){
		return $this->belongsTo('\App\Anggota', 'anggota_id');
	}
}
