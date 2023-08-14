<?php

namespace App\Http\Controllers;

use App\Ranting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\storage;

class RantingController extends Controller
{
    public function index()
    {
    	$ranting = DB::table('ranting')->orderBy('nama', 'asc')->paginate(10);
    	return view('anggota.ranting', ['ranting' => $ranting]);
    }

    public function create(Request $request)
    {
    	$nama = $request->input('nama');

    	if ($request->input('nama') == true) {
    		Ranting::create([
    			'nama' => $request->nama
    		]);
    		return redirect()->route('index.ranting')->with('sukses', 'Wilayah berhasil ditambahkan.');
    	} else {
    		return redirect()->route('index.ranting')->with('gagal', 'Tidak ada tambahan wilayah.');;
    	}
    }

    public function delete($id)
    {
        $dlt = DB::table('ranting')->where('id',$id)->delete();
        if ($dlt == true) {
            return redirect()->route('index.ranting')->with('hapus', 'Wilayah berhasil dihapus.');
        } else {
            return redirect()->route('index.ranting');
        }
    }
}
