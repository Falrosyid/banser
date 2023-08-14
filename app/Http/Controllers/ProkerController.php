<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Anggota;
use App\Ranting;
use App\User;
use App\Proker;
// use File;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProkerController extends Controller
{
    public function index()
    {
    	$proker = DB::table('proker')
    			->join('ranting', 'proker.ranting_id', '=' , 'ranting.id')
				->select('proker.*', 'ranting.nama as nama_ranting')
				->paginate(15);
    	$ranting = DB::table('ranting')
    			->orderBy('nama', 'asc')
    			->get();
    	return view('/proker/index', ['proker' => $proker, 'ranting' => $ranting]);
    }

    public function create()
    {
    	$ranting = DB::table('ranting')
    			->orderBy('nama', 'asc')
    			->get();
    	return view('/proker/create', ['ranting' => $ranting]);
    }

    public function submit(Request $request)
    {
    	$nama = $request->input('nama');

    	if ($nama == true) {
    		$proker = new Proker();
    		$proker->nama = $request->input('nama');
    		$proker->tanggal = $request->input('tanggal');
    		$proker->lokasi = $request->input('lokasi');
    		$proker->ranting_id = $request->input('ranting_id');
    		$proker->keterangan = $request->input('keterangan');
    		$proker->save();

    		return redirect('/proker')->with('sukses', 'Program Kerja berhasil ditambahkan.');
    	} else {
    		return redirect('/proker')->with('gagal', 'Tidak ada tambahan Program Kerja.');;
    	}
    }

    public function view($id)
    {
    	$proker = DB::table('proker')
    			->join('ranting', 'proker.ranting_id', '=' , 'ranting.id')
				->select('proker.*', 'ranting.nama as nama_ranting', 'ranting.id as id_ranting')
				->get();
        $ranting = DB::table('ranting')
                ->orderBy('nama', 'asc')
                ->get();
		return view('/proker/view', ['proker' => $proker, 'ranting' => $ranting]);
    }

    public function edit($id)
    {
        $proker = DB::table('proker')
                ->join('ranting', 'proker.ranting_id', '=' , 'ranting.id')
                ->select('proker.*', 'ranting.nama as nama_ranting', 'ranting.id as id_ranting')
                ->get();
        $ranting = DB::table('ranting')->get();
        
        return view('proker/update',['proker' => $proker, 'ranting' => $ranting]);
    }

    public function update(Request $request, $id)
    {
        $ft = Proker::find($id);
        DB::table('proker')->where('id',$id)->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal, 
            'lokasi' => $request->lokasi,
            'ranting_id' => $request->ranting_id,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/proker/{$ft->id}/view');
    }

    public function delete($id){
        DB::table('proker')->where('id',$id)->delete();

        return redirect()->back();
        

    }
}
