@extends('layouts.master')
@section('title','Update Data Diri')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card ">
                <!-- Page Heading -->
                <div class="card-header">
                  <h1 class="h3 mb-4 text-gray-900">Memperbarui Data Diri</h1>
                
                <!-- DataTales Example -->
                <div class="card">
                   <div class="card-body">
                    @foreach($anggota as $data)
                    <form action="{{ route('profile.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <table width="100%;" style="margin-top: 50px;"> 
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="nama" id="name" placeholder="Masukkan Nama" required="required" value="{{$data->nama}}" />
                                </td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="nik" id="nik" placeholder="Masukkan NIK" required="required" value="{{$data->nik}}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="tp_lahir" id="tp_lahir" placeholder="Masukkan Tempat Lahir" required="required" value="{{$data->tp_lahir}}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td>
                                    <input type="date" class="form-input" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" required="required" value="{{$data->tgl_lahir}}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="alamat" id="alamat" placeholder="Alamat" required="required" value="{{$data->alamat}}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Ranting</td>
                                <td>:</td>
                                <td>
                                    <select class="form-control" name="ranting_id" style="height: 55px;" required="required" value="">
                                        <option selected value="{{$data->ranting_id}}">{{$data->ranting}}</option>
                                        @foreach ($ranting as $rtg)
                                        <option value="{{$rtg->id}}" name="ranting_id" >{{$rtg->nama}}</option> 
                                        @endforeach
                                    </select>  
                                </td>
                            </tr>
                            <tr>
                                <td>Tinggi Badan</td>
                                <td>:</td>
                                <td>
                                    <input type="number" class="form-input" name="tg_badan" id="tg_badan" placeholder="Masukkan Tinggi Badan" required="required" value="{{$data->tg_badan}}">
                                </td>
                            </tr>
                            <tr>
                                <td>Sertifikas PKD</td>
                                <td>:</td>
                                <td>
                                    <input type="file" class="form-input" name="pkd" id="pkd" placeholder="Upload File" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>KTP</td>
                                <td>:</td>
                                <td>
                                    <input type="file" class="form-input" name="ktp" id="ktp" placeholder="Upload KTP" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Surat Rekomendasi</td>
                                <td>:</td>
                                <td>
                                    <input type="file" class="form-input" name="rekom" id="rekom" placeholder="Upload Surat Rekomendasi">
                                </td>
                            </tr>
                            <tr>
                                <td>Foto</td>
                                <td>:</td>
                                <td>
                                    <input type="file" class="form-input" name="foto" id="foto" placeholder="Upload foto">
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>
                                    <input type="email" class="form-input" name="email" id="email" placeholder="Masukkan Email" required="required" value="{{$data->email}}">
                                </td>
                            </tr>
                            <tr>
                                <td>No Handphone</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone" required="required" value="{{$data->no_hp}}">
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <div class="form-group">
                            <a href="{{ route('update.password', $data->remember_token)}}">Ubah Password?</a>
                        </div>
                        @endforeach
                        <div class="card-footer text-right">
                            <button class="btn btn-success mr-1" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>
</div>
</div>

@endsection

@push('page-scripts')

@endpush