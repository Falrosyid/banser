<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Anggota;
use App\Ranting;
use App\User;
use HTTP_Request2;
// use File;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesanController extends Controller
{
    public function pesan()
    {
    	$anggota = DB::table('anggota')
        ->select('*')
        // ->where('user_id', '!=', null)
        ->get();
        return view('whatsapp.pesan', ['anggota' => $anggota]);
    }

    public function send(Request $request)
    {
        // dd($request->input('tujuan'));
    	$tujuan = $request->input('tujuan');
    	$pesan = $request->input('pesan');
    	// dd($tujuan);
        foreach ($tujuan as $key => $tjn) {
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
              CURLOPT_POSTFIELDS => 'receiver='.$tjn.'&device=6288224729124'.'&message='.$pesan.'&type=chat',
              CURLOPT_HTTPHEADER => array(
                 'Accept: application/json',
                 'Content-Type: application/x-www-form-urlencoded',
                 'Authorization: Bearer 4rihhQjqtq8jRl8B67kFBQvwyQvWd87zHyt7uYG6LWaiZh5DwP'
             ),
          ));

           $response = curl_exec($curl);

           curl_close($curl);
           echo $response;
       }
       return redirect()->route('dashboard')->with('sukses','Pesan Telah Berhasil Dikirim.');
   }
}
