<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Sertifikat;
use App\Anggota;
use App\User;
// use File;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SertifikatController extends Controller
{
	public function create(Request $request, $id)
	{
		// dd($request->file('sertifikat'));
		

		if ($request->hasfile('sertifikat')) {

			$user = DB::table('users') 
			->select('*')
			->where('remember_token', $id)
			->get();
			foreach ($user as $key => $value) {
			}

			$anggota = DB::table('anggota')    	
			->join('users', 'anggota.user_id', '=', 'users.id')
			->join('ranting', 'anggota.ranting_id', '=', 'ranting.id')
			->select('anggota.id as id', 'users.email as email', 'users.role as role', 'users.password as password', 'ranting.nama as ranting', 'users.remember_token as remember_token')
			->where('anggota.user_id', $value->id )
			->get();
			foreach ($anggota as $agt) {
			}

			$files = $request->file('sertifikat');
			$ser_nama = $request->input('sertifikat_nama');
			$ser_tgl = $request->input('sertifikat_tgl');
			$ser_tpt = $request->input('sertifikat_tpt');

			foreach ($files as $key => $file) {
			// $sertif = new Sertifikat();
				$extension = $file->getClientOriginalExtension();
				$sertifikat = 'SERTIF'.time().'.'.$extension;
				$file->move('public/img/sertifikat/', $sertifikat);

				$data = array(
					'nama' => $request->sertifikat_nama[$key],
					'tanggal' => $request->sertifikat_tgl[$key],
					'tempat' => $request->sertifikat_tpt[$key],
					'foto' => $sertifikat,
					'anggota_id' => $agt->id,
				);

				DB::table('sertifikat')->insert($data);

			// 	$sertif->foto = $sertifikat;
			// 	$sertif->nama = $ser_nama[$file];
			// 	$sertif->tanggal = $ser_tgl[$file];
			// 	$sertif->tempat = $ser_tpt[$file];
			// 	$sertif->anggota_id = $key->id;
			// $sertif->save();
			}

			return redirect()->route('profile' , ['id' => $id])->with('sukses', 'Riwayat Diklat berhasil ditambahhkan');

		} else {
			return redirect()->route('profile' , ['id' => $id])->with('gagal', 'Harap Lengkapi data Diklat.');
		}
	}
}
