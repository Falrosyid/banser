<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Anggota;
use App\Ranting;
use App\User;
use App\Kegiatan;
// use File;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = DB::table('kegiatan')
                ->join('ranting', 'kegiatan.ranting_id', '=' , 'ranting.id')
                ->join('anggota', 'kegiatan.anggota_id', '=' , 'anggota.id')
                ->select('kegiatan.*', 'ranting.nama as ranting', 'anggota.nama as nama_anggota')
                ->orderBy('tanggal', 'asc')
                ->paginate(15);
        $ranting = DB::table('ranting')
                ->orderBy('nama', 'asc')
                ->get();
        $anggota = DB::table('anggota')
                ->orderBy('nama', 'asc')
                ->where('user_id', '!=', null)
                ->get();
        return view('kegiatan/index', ['kegiatan' => $kegiatan, 'ranting' => $ranting, 'anggota' => $anggota]);
    }

    public function create()
    {
    	$ranting = DB::table('ranting')
    			->orderBy('nama', 'asc')
    			->get();
    	$anggota = DB::table('anggota')
    			->orderBy('nama', 'asc')
    			->get();
    	return view('kegiatan/create', ['ranting' => $ranting, 'anggota' =>$anggota]);
    }

    public function submit(Request $request)
    {
    	$kegiatan = new Kegiatan();
    	$kegiatan->nama = $request->input('nama');
    	$kegiatan->tanggal = $request->input('tanggal');
    	$kegiatan->anggota_id = $request->input('anggota_id');
    	$kegiatan->ranting_id = $request->input('ranting_id');
    	$kegiatan->lokasi = $request->input('lokasi');
    	$kegiatan->keterangan = $request->input('keterangan');
    	if ($request->hasfile('foto')) {
    		$file = $request->file('foto');
    		$extension = $file->getClientOriginalExtension();
            $keg = 'KGT'.$request->tanggal.'-'.time().'.'.$extension;
            $file->move('public/img/kegiatan/', $keg);
            $kegiatan->foto = $keg;
        }
        $kegiatan->save();

        return redirect()->route('kegiatan');
    }

    public function view($id)
    {
    	$kegiatan = DB::table('kegiatan')
    			->join('ranting', 'kegiatan.ranting_id', '=' , 'ranting.id')
    			->join('anggota', 'kegiatan.anggota_id', '=' , 'anggota.id')
    			->select('kegiatan.*', 'anggota.nama as nama_anggota', 'ranting.nama as ranting')
                ->where('kegiatan.id', $id)
    			->get();
        $ranting = DB::table('ranting')
                ->orderBy('nama', 'asc')
                ->get();
        $anggota = DB::table('anggota')
                ->orderBy('nama', 'asc')
                ->get();
    	return view('kegiatan/view', ['kegiatan' => $kegiatan, 'ranting' => $ranting, 'anggota' =>$anggota]);
    }

    public function edit($id)
    {
        $kegiatan = DB::table('kegiatan')
                ->join('ranting', 'kegiatan.ranting_id', '=' , 'ranting.id')
                ->join('anggota', 'kegiatan.anggota_id', '=' , 'anggota.id')
                ->select('kegiatan.*', 'anggota.nama as nama_anggota', 'ranting.nama as ranting')
                ->where('kegiatan.id', $id)
                ->get();
        $ranting = DB::table('ranting')
                ->orderBy('nama', 'asc')
                ->get();
        $anggota = DB::table('anggota')
                ->orderBy('nama', 'asc')
                ->get();
        return view('kegiatan/update', ['kegiatan' => $kegiatan, 'ranting' => $ranting, 'anggota' =>$anggota]);
    }

    public function update(Request $request, $id)
    {
        $ft = Kegiatan::find($id);

        if ($request->hasfile('foto')) {
            File::delete('public/img/kegiatan'.$ft->foto);

            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $foto = 'KGT'.$request->tanggal.'-'.time().'.'.$extension;
            $file->move('public/img/profil', $foto);
             DB::table('anggota')->where('id',$id)->update([
                'foto' => $foto 
             ]);

        } else {

        }
        DB::table('kegiatan')->where('id',$id)->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal, 
            'lokasi' => $request->lokasi,
            'anggota_id' => $request->anggota_id,
            'ranting_id' => $request->ranting_id,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('view.kegiatan', $ft->id);
    }
    public function delete($id)
    {
         DB::table('kegiatan')->where('id',$id)->delete();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $awal = $request->input('awal');
        $akhir = $request->input('akhir');
        $kegiatan = DB::table('kegiatan')
                ->join('ranting', 'kegiatan.ranting_id', '=' , 'ranting.id')
                ->join('anggota', 'kegiatan.anggota_id', '=' , 'anggota.id')
                ->select('kegiatan.*', 'ranting.nama as ranting', 'anggota.nama as nama_anggota')
                ->whereBetween('tanggal', [$awal, $akhir])
                ->orderBy('tanggal', 'asc')
                ->paginate(15);
        $ranting = DB::table('ranting')
                ->orderBy('nama', 'asc')
                ->get();
        $anggota = DB::table('anggota')
                ->orderBy('nama', 'asc')
                ->where('user_id', '!=', null)
                ->get();
        return view('kegiatan/index', ['kegiatan' => $kegiatan, 'ranting' => $ranting, 'anggota' => $anggota]);
    }
}
