@extends('layouts.master')
@section('title','Tambah Anggota')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
    <!-- Page Heading -->
                <div class="card-header">
                  <h1 class="h3 mb-4 text-gray-900">Tambah Anggota</h1>

                  <form action="{{ route('simpan.anggota') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <table width="100%;" style="margin-top: 50px;"> 
                            <tr>
                                <td>Nama Lengkap<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="nama" id="name" placeholder="Masukkan Nama" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>NIK<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="nik" id="nik" placeholder="Masukkan NIK" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Anggota</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="no_anggota" id="no_anggota" placeholder="Masukkan Nomor Anggota" />
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="tp_lahir" id="tp_lahir" placeholder="Masukkan Tempat Lahir" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="date" class="form-input" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="alamat" id="alamat" placeholder="Alamat" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Ranting<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <select class="form-control" name="ranting_id" style="height: 55px;" required="required">
                                        <option selected>Pilih Ranting</option>
                                        @foreach ($anggota as $data)
                                        <option value="{{$data->id}}" name="ranting_id" >{{$data->nama}}</option> 
                                        @endforeach
                                    </select>  
                                </td>
                            </tr>
                            <tr>
                                <td>Tinggi Badan<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" class="form-input" name="tg_badan" id="tg_badan" placeholder="Masukkan Tinggi Badan" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td>Sertifikas PKD<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="file" class="form-input" name="pkd" id="pkd" placeholder="Upload File" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td>KTP<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="file" class="form-input" name="ktp" id="ktp" placeholder="Upload KTP" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td>KTA<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="file" class="form-input" name="kta" id="kta" placeholder="Upload KTA" required="required">
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
                                <td>Email<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="email" class="form-input" name="email" id="email" placeholder="Masukkan Email" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td>No Handphone<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone" required="required">
                                </td>
                            </tr>
                        </table>
                        <div class="card-footer text-right">
                            <button class="btn btn-success mr-1" type="submit">Simpan</button>
                        </div>
                    </form>
               
        <!-- DataTales Example -->
          <!-- div class="card">
             <div class="card-body">
                <form action="{{ route('simpan.anggota') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-gray-900">No Anggota</label>
                            <input type="text" name="no_anggota" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-gray-900">Nama Anggota</label>
                            <input type="text" name="nama_anggota" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ranting</label>
                            <select class="form-control" name="ranting_id">
                              @foreach ($anggota as $data)
                                <option value="{{$data->id}}" name="ranting_id" >{{$data->nama}}</option> 
                              @endforeach
                            </select>  
                            {{-- <label class="text-gray-900">Ranting</label>
                            <input type="text" name="ranting_id" class="form-control"> --}}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-gray-900">Tempat, Tanggal Lahir</label>
                            <input type="text" name="ttl" class="form-control">
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-gray-900">Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-gray-900" for="jabatan">jabatan</label>
                            <input type="text" name="jabatan" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-gray-900">Seragam</label>
                            <input type="text" name="seragam" class="form-control">
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-gray-900">No Hp</label>
                            <input type="number" name="no_hp" class="form-control">
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-gray-900">File</label>
                            <input type="file" name="foto" class="form-control" required=""> 
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-gray-900">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-gray-900">Pengalaman Diklat</label>
                            <textarea name="diklat" class="form-control"></textarea>
                        </div>
                    </div>

                </div>

                  <div class="card-footer text-right">
                    <button class="btn btn-success mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </form>
             </div>
            </div> -->
          </div>  
        </div>
    </div>
</div>
</div>
         
    @endsection

    @push('page-scripts')

    @endpush