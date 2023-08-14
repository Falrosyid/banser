<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Anggota;
use App\Ranting;
use App\User;
// use File;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnggotaController extends Controller
{
    // tampilkan data
    public function index(){
        $id = Auth::id(); 
        $role = DB::table('users')
                ->select('role')
                ->where('id', $id)
                ->get();
        foreach ($role as $r) {
        }
        $ranting = DB::table('anggota')
                ->select('ranting_id')
                ->where('user_id', $id)
                ->get();
        foreach ($ranting as $rtg) {
        }
        $anggota = DB::table('anggota')
                ->join('ranting', 'anggota.ranting_id', '=' , 'ranting.id')
                ->select('anggota.*', 'ranting.nama as nama_ranting')
                ->paginate(15);
        $agt = DB::table('anggota')
                ->join('ranting', 'anggota.ranting_id', '=' , 'ranting.id')
                ->select('anggota.*', 'ranting.nama as nama_ranting')
                ->where('user_id', '!=', null)
                ->where('ranting_id', $rtg->ranting_id)
                ->paginate(15);
        return view('anggota/index',['anggota' => $anggota, 'agt' => $agt]);
    }

    // methode untuk menampilkan form tambah data
    public function tambah(){
        $anggota = DB::table('ranting')
                ->orderBy('nama', 'asc')
                ->get();
        return view('anggota/create', ['anggota' => $anggota]);
    }

    // methode untuk simpan data
    public function simpan(Request $request){
        //menambahkan user anggota//
        $user = new User();
        $user->role = 'anggota';
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        //tambah data anggota//
        $calon = new Anggota();
        $calon->user_id = $user->id;
        $calon->nama = $request->input('nama');
        $calon->nik = $request->input('nik');
        $calon->no_anggota = $request->input('no_anggota');
        $calon->tp_lahir = $request->input('tp_lahir');
        $calon->tgl_lahir = $request->input('tgl_lahir');
        $calon->alamat = $request->input('alamat');
        $calon->ranting_id = $request->input('ranting_id');
        $calon->tg_badan = $request->input('tg_badan');
        $calon->no_hp = $request->input('no_hp');
        $calom->status = "sudah aktif";

        if($request->hasfile('pkd')){
            $file = $request->file('pkd');
            $extension = $file->getClientOriginalExtension();
            $pkd = 'PKD'.time().'.'.$extension;
            $file->move('public/img/pkd/', $pkd);
            $calon->pkd = $pkd;
        }
        if ($request->hasfile('ktp')) {
            $file = $request->file('ktp');
            $extension = $file->getClientOriginalExtension();
            $ktp = 'KTP'.time().'.'.$extension;
            $file->move('public/img/ktp/', $ktp);
            $calon->ktp = $ktp;
        }
        if ($request->hasfile('kta')) {
            $file = $request->file('kta');
            $extension = $file->getClientOriginalExtension();
            $kta = 'KTA'.time().'.'.$extension;
            $file->move('public/img/kta/', $kta);
            $calon->kta = $kta;
        }
        if ($request->hasfile('rekom')) {
            $file = $request->file('rekom');
            $extension = $file->getClientOriginalExtension();
            $rekom = 'REKOM'.time().'.'.$extension;
            $file->move('public/img/rekom/', $rekom);
            $calon->rekom = $rekom;
        }
        $calon->save();
        
        return redirect()->route('anggota');
    }
    

    // methode untuk edit data
    public function edit($id){
        $cek = DB::table('anggota')
                ->select('user_id')
                ->where('id', $id)
                ->get();
        foreach ($cek as $key) {
        }
        // dd($key->user_id);
        if ($key->user_id == null) {
            $anggota = DB::table('anggota')
            ->join('ranting', 'anggota.ranting_id', '=', 'ranting.id')
            ->select('anggota.*', 'ranting.nama as ranting')
            ->where('anggota.id', $id )
            ->get();    
        } else{
         $anggota = DB::table('anggota')     
            ->join('users', 'anggota.user_id', '=', 'users.id')
            ->join('ranting', 'anggota.ranting_id', '=', 'ranting.id')
            ->select('anggota.*', 'users.email as email', 'users.password as password', 'ranting.nama as ranting', 'users.remember_token as remember_token', 'users.role as role')
            ->where('anggota.id', $id )
            ->get();   
        }
        $ranting = DB::table('ranting')->get();
        
        return view('anggota/update',['anggota' => $anggota, 'ranting' => $ranting, 'cek' =>$cek]);

    }

    // methode untuk hapus data
    public function delete($id){
        $ft = Anggota::find($id);
        if (File::exists('public/img/'.$ft->foto)) {
            File::delete('public/img/'.$ft->foto);
        }
        if (File::exists('public/img/'.$ft->pkd)) {
            File::delete('public/img/'.$ft->pkd);
        }
        if (File::exists('public/img/'.$ft->ktp)) {
            File::delete('public/img/'.$ft->ktp);
        }
        if (File::exists('public/img/'.$ft->kta)) {
            File::delete('public/img/'.$ft->kta);
        }
        if (File::exists('public/img/'.$ft->rekom)) {
            File::delete('public/img/'.$ft->rekom);
        }
        DB::table('anggota')->where('id',$id)->delete();
        DB::table('users')->where('id',$ft->user_id)->delete();

        return redirect()->back();
        
    }        
    
    // methode untuk update data
    public function update(Request $request,$id){
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
            $rekom = 'REKOM-'.$ft->nik.'-'.time().'.'.$extension;
            $file->move('public/img/rekom', $rekom);
            DB::table('anggota')->where('id',$id)->update([
                'rekom' => $rekom 
             ]);

        } else {

        }

        // dd($ft->id);
        DB::table('anggota')->where('id',$id)->update([
            'no_anggota' => $request->no_anggota,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'ranting_id' => $request->ranting_id,
            'tg_badan' => $request->tg_badan,
            'tp_lahir' => $request->tp_lahir, 
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        DB::table('users')->where('id', $ft->user_id)->update([
            'email' => $request->email,
        ]);
        if($request->has('reset_psw')){
            //Checkbox checked
            DB::table('users')->where('id', $ft->user_id)->update([
                'password' => bcrypt('rahasia'),
            ]);
        }else{
            //Checkbox not checked
        }
        return redirect()->route('anggota');

    }

        // methode melihat anggota
    public function view(Request $request,$id){
        $cek = DB::table('anggota')
                ->select('user_id')
                ->where('id', $id)
                ->get();
        foreach ($cek as $key) {
        }
        // dd($key->user_id);
        if ($key->user_id == null) {
            $anggota = DB::table('anggota')
            ->join('ranting', 'anggota.ranting_id', '=', 'ranting.id')
            ->select('anggota.*', 'ranting.nama as ranting')
            ->where('anggota.id', $id )
            ->get();    
        } else{
         $anggota = DB::table('anggota')     
            ->join('users', 'anggota.user_id', '=', 'users.id')
            ->join('ranting', 'anggota.ranting_id', '=', 'ranting.id')
            ->select('anggota.*', 'users.email as email', 'users.password as password', 'ranting.nama as ranting', 'users.remember_token as remember_token', 'users.role as role')
            ->where('anggota.id', $id )
            ->get();   
        }
        return view('anggota/view',['anggota' => $anggota, 'cek' => $cek]);
        
    }

    public function terima($id)
    {
        $anggota = Anggota::with('ranting')->where('id',$id)->get();
        foreach ($anggota as $key => $value) {
        }
        // dd($value->no_hp);
        $pesan = "Halo ".$value->nama.". Kamu Diterima, silahkan Klik link https://ta.poliwangi.ac.id/~ti17004/registrasi/".$id."";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.whatspie.com/api/messages',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'receiver='.$value->no_hp.'&device=6285163675452'.'&message='.$pesan.'&type=chat',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer zUTphFuSRfpADJk6YRDCQELGy4gNPZhbEdyWKtpmS1BibpO5Hj'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        return redirect()->route('anggota')->with('terima', 'Tanggapan telah Dikirim');
    }

    public function tolak($id)
    {
        $ft = Anggota::find($id);

        $pesan = "Mohon Maaf kamu belum bisa menjadi anggota Banser, karena persyaratan masih kurang.";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.whatspie.com/api/messages',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'receiver='.$ft->no_hp.'&device=6285163675452'.'&message='.$pesan.'&type=chat',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer zUTphFuSRfpADJk6YRDCQELGy4gNPZhbEdyWKtpmS1BibpO5Hj'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        if (File::exists('public/img/'.$ft->foto)) {
            File::delete('public/img/'.$ft->foto);
        } else {

        }
        DB::table('anggota')->where('id',$id)->delete();

        return redirect()->route('anggota')->with('terima', 'Tanggapan telah Dikirim');

    }

    public function aktivasi($id)
    {
        $data = DB::table('anggota')->where('id', $id)->update([
        'status' => "Aktif"
    ]);
        return redirect()->route('view.anggota' , ['id' => $id]);
    }

    public function nonaktif($id)
    {
        $data = DB::table('anggota')->where('id', $id)->update([
        'status' => "Tidak Aktif"
    ]);
        return redirect()->route('view.anggota' , ['id' => $id]);
    }


}