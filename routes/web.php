<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@home')->name('home');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@submit')->name('postlogin');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/postregist', 'AuthController@postregist')->name('postregist');
Route::get('/registrasi/{id}/', 'AuthController@user')->name('user.regist');
Route::post('/postuser/{id}', 'AuthController@postuser')->name('postuser');

Route::group(['middleware' => ['auth', 'cekrole:admin']], function(){

    //route untuk ranting
    Route::get('/ranting', 'RantingController@index')->name('index.ranting');
    Route::post('/create-ranting', 'RantingController@create')->name('create.ranting');
    Route::get('/{id}/delete', 'RantingController@delete')->name('delete.ranting');

	// route untuk anggota
    Route::get('/anggota/tambah','AnggotaController@tambah')->name('tambah.anggota');
    Route::post('/anggota/submit','AnggotaController@simpan')->name('simpan.anggota');
    Route::post('/anggota/{id}','AnggotaController@delete')->name('delete.anggota');
    Route::get('/anggota/{id}/edit','AnggotaController@edit')->name('edit.anggota');
    Route::post('/anggota/{id}/update','AnggotaController@update')->name('update.anggota');
    Route::get('/anggota/{id}/view','AnggotaController@view')->name('view.anggota');
    Route::get('/anggota/{id}/terima','AnggotaController@terima')->name('terima');
    Route::get('/anggota/{id}/tolak','AnggotaController@tolak')->name('tolak');
    Route::get('/anggota/{id}/aktivasi','AnggotaController@aktivasi')->name('aktivasi');
    Route::get('/anggota/{id}/nonaktifkan','AnggotaController@nonaktif')->name('nonaktikan');


    // route untuk program kerja
    Route::get('/proker', 'ProkerController@index')->name('proker');
    Route::get('/proker/tambah', 'ProkerController@create')->name('tambah.proker');
    Route::post('/proker/submit', 'ProkerController@submit')->name('simpan.proker');
    Route::get('/proker/{id}/view', 'ProkerController@view')->name('view.proker');
    Route::get('/proker/{id}/edit', 'ProkerController@edit')->name('edit.proker');
    Route::post('/proker/{id}/update', 'ProkerController@update')->name('update.proker');
    Route::get('/proker/{id}/delete','ProkerController@delete')->name('delete.proker');

    //route untuk Kegiatan
    Route::get('/kegiatan', 'KegiatanController@index')->name('kegiatan');
    Route::post('/kegiatan/search', 'KegiatanController@search')->name('search.kegiatan');
    Route::get('/kegiatan/tambah', 'KegiatanController@create')->name('tambah.kegiatan');
    Route::post('/kegiatan/submit', 'kegiatanController@submit')->name('simpan.kegiatan');
    Route::get('/kegiatan/{id}/edit', 'KegiatanController@edit')->name('edit.kegiatan');
    Route::post('/kegiatan/{id}/update', 'kegiatanController@update')->name('update.kegiatan');
    Route::get('/kegiatan/{id}/view', 'KegiatanController@view')->name('view.kegiatan');
    Route::get('/kegiatan/{id}/delete','kegiatanController@delete')->name('delete.kegiatan');

    //route untuk Whatsapp
    Route::get('/pesan', 'PesanController@pesan')->name('pesan');
    Route::post('pesan/kirim', 'PesanController@send')->name('kirim.pesan');

    //route untuk jabatan
    Route::get('/ubah-satkoryon/{id}', 'AuthController@satkoryon')->name('ubah.satkoryon');
    Route::get('/ubah-anggota/{id}', 'AuthController@anggota')->name('ubah.anggota');
});

Route::group(['middleware' => ['auth', 'cekrole:admin,anggota,satkoryon']], function(){
    Route::get('/anggota/{id}/view','AnggotaController@view')->name('view.anggota');
    Route::get('/proker/{id}/view', 'ProkerController@view')->name('view.proker');
    Route::get('/kegiatan/{id}/view', 'KegiatanController@view')->name('view.kegiatan');
});

Route::group(['middleware' => ['auth', 'cekrole:admin,anggota,satkoryon']], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    //route untuk akun profile
    Route::get('/profile/{id}', 'DashboardController@profile')->name('profile');
    Route::get('/profile/setting/{id}', 'DashboardController@editprofil')->name('profile.setting');
    Route::get('/profile/pswd/{id}', 'DashboardController@password')->name('update.password');
    Route::post('/profile/{id}/update', 'DashboardController@update')->name('profile.update');
    Route::post('/profile/pswd/{id}/update', 'DashboardController@updatepassword')->name('password.update');
    Route::post('/profile/{id}/sertifikat/create', 'SertifikatController@create')->name('create.sertifikat');


    Route::get('/anggota','AnggotaController@index')->name('anggota');
    Route::get('/proker', 'ProkerController@index')->name('proker');
    Route::get('/kegiatan', 'KegiatanController@index')->name('kegiatan');
});
