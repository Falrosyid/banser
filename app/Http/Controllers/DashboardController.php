<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Anggota;
use App\Ranting;
use App\User;
use App\Kegiatan;
use App\Proker;
use App\Sertifikat;
// use File;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function home()
    {
        $kegiatan = DB::table('kegiatan')
                ->select('*')
                ->get();
        return view('/home', ['kegiatan' => $kegiatan ]);
    }
    public function index()
    {
        $id = Auth::id(); 
        $ranting = DB::table('anggota')
                ->select('ranting_id')
                ->where('user_id', $id)
                ->get();
        foreach ($ranting as $rtg) {
        }

    	$ranting = DB::table('ranting')
    			->count();
    	$anggota = DB::table('anggota')
    			->count();
        $agt = DB::table('anggota')
                ->where('ranting_id', $rtg->ranting_id)
                ->count();
    	$kegiatan = DB::table('kegiatan')
    			->count();
    	$proker = DB ::table('proker')
    			->count();
        return view('dashboard.index', ['ranting' => $ranting, 'anggota' => $anggota, 'agt' => $agt,  'kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    public function profile($id)
    {
    	$user = DB::table('users') 
    		->select('*')
    		->where('remember_token', $id)
    		->get();
    	foreach ($user as $key => $value) {
    	}
    	$anggota = DB::table('anggota')    	
    		->join('users', 'anggota.user_id', '=', 'users.id')
    		->join('ranting', 'anggota.ranting_id', '=', 'ranting.id')
    		->select('anggota.*', 'users.email as email', 'users.role as role', 'users.password as password', 'ranting.nama as ranting', 'users.remember_token as remember_token')
    		->where('anggota.user_id', $value->id )
    		->get();
        foreach ($anggota as $key) {
            
        }
        $sertifikat = DB::table('sertifikat')
                ->join('anggota', 'sertifikat.anggota_id', '=', 'anggota.id')
                ->select('sertifikat.*')
                ->where('sertifikat.anggota_id', $key->id)
                ->get();

    	return view('dashboard.akun', ['user' => $user, 'anggota' => $anggota, 'sertifikat' => $sertifikat]);
    }

    public function editprofil($id)
    {
    	$user = DB::table('users') 
    		->select('*')
    		->where('remember_token', $id)
    		->get();
    	foreach ($user as $key => $value) {
    	}
    	$anggota = DB::table('anggota')     
            ->join('users', 'anggota.user_id', '=', 'users.id')
            ->join('ranting', 'anggota.ranting_id', '=', 'ranting.id')
            ->select('anggota.*', 'users.email as email', 'users.password as password', 'ranting.nama as ranting', 'users.remember_token as remember_token')
            ->where('anggota.user_id', $value->id )
            ->get();
        $ranting = DB::table('ranting')->get();
    	return view('dashboard/profil-update', ['anggota' => $anggota, 'ranting' => $ranting]);
    }

    public function update(Request $request,$id)
    {
    	$ft = Anggota::find($id);
        if($request->hasfile('pkd')){
            $file = $request->file('pkd');
            $extension = $file->getClientOriginalExtension();
            $pkd = 'PKD-'.$ft->nik.time().'.'.$extension;
            $file->move('public/img/pkd/', $pkd);
            DB::table('anggota')->where('id',$id)->update([
                'pkd' => $pkd 
             ]);
        } else {

        }

        if ($request->hasfile('foto')) {
            File::delete('public/img/profil'.$ft->foto);

            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $foto = 'PROF-'.$ft->nik.'-'.time().'.'.$extension;
            $file->move('public/img/profil', $foto);
             DB::table('anggota')->where('id',$id)->update([
                'foto' => $foto 
             ]);

        } else {

        }

        if ($request->hasfile('ktp')) {
            File::delete('public/img/ktp'.$ft->ktp);

            $file = $request->file('ktp');
            $extension = $file->getClientOriginalExtension();
            $ktp = 'KTP-'.$ft->nik.'-'.time().'.'.$extension;
            $file->move('public/img/ktp', $ktp);
            DB::table('anggota')->where('id',$id)->update([
                'ktp' => $ktp 
             ]);

        } else {

        }

        if ($request->hasfile('kta')) {
            File::delete('public/img/kta'.$ft->kta);

            $file = $request->file('kta');
            $extension = $file->getClientOriginalExtension();
            $kta = 'KTA-'.$ft->nik.'-'.time().'.'.$extension;
            $file->move('public/img/kta', $kta);
            DB::table('anggota')->where('id',$id)->update([
                'kta' => $kta 
             ]);

        } else {

        }

        if ($request->hasfile('rekom')) {
            File::delete('public/img/rekom'.$ft->rekom);

            $file = $request->file('rekom');
            $extension = $file->getClientOriginalExtension();
            $rekom = 'rekom-'.$ft->nik.'-'.time().'.'.$extension;
            $file->move('public/img/rekom', $rekom);
            DB::table('anggota')->where('id',$id)->update([
                'rekom' => $rekom 
             ]);

        } else {

        }

        // dd($ft->id);
        DB::table('anggota')->where('id',$id)->update([
            'no_anggota' => $request->id_anggota,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'ranting_id' => $request->ranting_id,
            'tg_badan' => $request->tg_badan,
            'tp_lahir' => $request->tp_lahir, 
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        return redirect()->route('dashboard');
    }

    public function password($id)
    {
        $user = DB::table('users') 
            ->select('*')
            ->where('remember_token', $id)
            ->get();
        return view('dashboard.update-password', ['user' => $user]);
    }

    public function updatepassword(Request $request, $id)
    {
        $data = User::find($id);
        if (Hash::check($request->input('old_pswd'), $data->password)) {
            // The passwords match...
            if ($request->input('new_pswd') == $request->input('rpt_pswd')) {
                DB::table('users')->where('remember_token', $data->remember_token)->update([
                    'password' => bcrypt($request->input('new_pswd')),
                ]);
                return redirect()->route('profile' , ['id' => $data->remember_token])->with('beda', 'Password Baru Tidak Sesuai.');
            } else {
                return redirect()->route('update.password' , ['id' => $data->remember_token])->with('beda', 'Password Baru Tidak Sesuai.');
            }
        } else{
            return redirect()->route('update.password' , ['id' => $data->remember_token])->with('gagal', 'Password Lama Salah.');
        }
    }
}
