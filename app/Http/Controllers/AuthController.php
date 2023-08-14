<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ranting;
use App\Anggota;
use App\Sertifikat;
use App\User;
use Auth;
use File;
use App\Mail\BanserEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthController extends Controller
{
    public function register()
    {
        $ranting = Ranting::all();
        return view('auth.daftar', ['ranting' => $ranting]);
    }

    public function postregist(Request $request)
    {
        // dd($request->hasfile('pkd'));
        //tambah data anggota//
        $calon = new Anggota();
        // $calon->user_id = $user->id;
        $calon->nama = $request->input('nama');
        $calon->nik = $request->input('nik');
        $calon->tp_lahir = $request->input('tp_lahir');
        $calon->tgl_lahir = $request->input('tgl_lahir');
        $calon->alamat = $request->input('alamat');
        $calon->ranting_id = $request->input('ranting_id');
        $calon->tg_badan = $request->input('tg_badan');

        if($request->hasfile('foto')){
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $profil = 'PROF-'.time().'.'.$extension;
            $file->move('public/img/profil/', $profil);
            $calon->foto = $profil;
        }
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
        if ($request->hasfile('rekom')) {
            $file = $request->file('rekom');
            $extension = $file->getClientOriginalExtension();
            $rekom = 'REKOM'.time().'.'.$extension;
            $file->move('public/img/rekom/', $rekom);
            $calon->rekom;
        }
        $calon->no_hp = $request->input('no_hp');
        $calon->save();

        $sertif = $request->input('sertifikat_nama');
        if ($sertif == null) {

        } else {
            $ser_nama = $request->input('sertifikat_nama');
            $ser_tgl = $request->input('sertifikat_tgl');
            $ser_tpt = $request->input('sertifikat_tpt');
            $ser_sertifikat = $request->file('sertifikat');

            foreach ($ser_nama as $key => $value) {
              $sertifikat = new Sertifikat();
              $sertifikat->nama = $value;
              $sertifikat->tanggal = $ser_tgl[$key];
              $sertifikat->tempat = $ser_tpt[$key];
              $sertifikat->anggota_id = $calon->id;

              if ($request->hasfile($ser_sertifikat[$key])) {
                  $file = $request->file($ser_sertifikat[$key]);
                  $extension = $file->getClientOriginalExtension();
                  $sertifikat = 'SERTIF'.time().'.'.$extension;
                  $file->move('public/img/sertifikat/', $sertifikat);
                  $sertifikat->foto = $sertifikat;
              }
              $sertifikat->save();
          }
      }

      $satkor = DB::table('users')
      ->select('*')
      ->where('role', 'satkoryon')
      ->get();
      foreach ($satkor as $key => $sat) {
      }
      $nomor = DB::table('anggota')
      ->select('*')
      ->where('user_id', $sat->id)
      ->get();
      foreach ($nomor as $key => $no) {
      }

      $tujuan = $no->no_hp;
        $pesan = $calon->nama." Mendaftar Sebagai Calon Anggota, silahkan Klik https://ta.poliwangi.ac.id/~ti17004/anggota/".$calon->id."";
        // dd($tujuan);

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
            CURLOPT_POSTFIELDS => 'receiver='.$tujuan.'&device=6285163675452'.'&message='.$pesan.'&type=chat',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer zUTphFuSRfpADJk6YRDCQELGy4gNPZhbEdyWKtpmS1BibpO5Hj'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        // Mail::to("yudha@gmail.com")->send(new BanserEmail());

      return redirect('/')->with('berhasil', 'Terimakasih Telah Mendaftar Sebagai Anggota Banser.');


  }

  public function user($id)
  {
    $cek = Anggota::find($id);
    $anggota = DB::table('anggota')
    ->join('ranting', 'anggota.ranting_id', '=', 'ranting.id')
    ->select('anggota.*', 'ranting.nama as ranting')
    ->where('anggota.id', $id )
    ->get();
        // dd($anggota);
    $ranting = Ranting::all();
    return view('auth.register', ['ranting' => $ranting , 'cek' => $cek, 'anggota' => $anggota]);
}

public function postuser(Request $request,$id)
{
    $data = Anggota::find($id);
    $user = new User();
    $user->role = 'anggota';
    $user->name = $data->nama;
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->remember_token = str_random(60);
    $user->save();

    DB::table('anggota')->where('id', $id)->update([
        'user_id' => $user->id,
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
    }
    return redirect()->route('dashboard');
}

public function login()
{
 return view('auth.login');
}

public function submit(Request $request)
{
        // dd($request->all());
    $user = DB::table('users')
    ->select('id')
    ->where('email', $request->input('email'))
    ->get();
    foreach ($user as $key) {
        # code...
    }
    $anggota = DB::table('anggota')
    ->select('*')
    ->where('user_id', $key->id)
    ->get();
    foreach ($anggota as $cek) {
        # code...
    }
    if ($cek->status == 'Aktif') {
       if (Auth::attempt($request->only('email', 'password'))) {
          return redirect()->route('dashboard');
      } else {
          return redirect()->route('login');
      }
    } else {
        return redirect()->route('home')->with('gagal', 'Kamu Tidak Aktif Menjadi Anggota. Harap Hubungi Admin untuk Kembali Mengkatifkan');
    }
}

public function satkoryon($id)
{
    $data = DB::table('users')->where('remember_token', $id)->update([
        'role' => "satkoryon"
    ]);
    $anggota = DB::table('anggota')     
    ->join('users', 'anggota.user_id', '=', 'users.id')
    ->join('ranting', 'anggota.ranting_id', '=', 'ranting.id')
    ->select('anggota.*', 'users.email as email', 'users.password as password', 'ranting.nama as ranting', 'users.remember_token as remember_token', 'users.role as role')
    ->where('users.remember_token', $id )
    ->get();
    foreach ($anggota as $key) {
    }
    return redirect()->route('view.anggota' , ['id' => $key->id]);
}

public function anggota($id)
{
    $data = DB::table('users')->where('remember_token', $id)->update([
        'role' => "anggota"
    ]);
    $anggota = DB::table('anggota')     
    ->join('users', 'anggota.user_id', '=', 'users.id')
    ->join('ranting', 'anggota.ranting_id', '=', 'ranting.id')
    ->select('anggota.*', 'users.email as email', 'users.password as password', 'ranting.nama as ranting', 'users.remember_token as remember_token', 'users.role as role')
    ->where('users.remember_token', $id )
    ->get();
    foreach ($anggota as $key) {
    }
    return redirect()->route('view.anggota' , ['id' => $key->id]);
}

public function logout()
{
   Auth::logout();
   return redirect()->route('home');
}
}
