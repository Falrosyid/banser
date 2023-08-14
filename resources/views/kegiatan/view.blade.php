@extends('layouts.master')
@section('title', 'Profil Anggota Banser' )
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
    <!-- Page Heading -->
    @foreach ($kegiatan as $data)
    <hr>
            
            {{-- content --}}
            <div class="container-xl px-4 mt-4">
                <!-- Account page navigation-->

                <div class="row">
                        
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header text-gray-900">{{$data->nama}}
                                <button type="button" class="btn btn-sm" style="float: right;" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-edit" ></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                   
                                    <!-- Form Group (Nama Lengkap)-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="small mb-1 text-gray-900 " for="nama" >Nama Program Kerja</label>
                                            <input readonly="readonly" type="text" class="form-input" name="nama" id="name" value="{{ $data->nama}}" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="small mb-1 text-gray-900 " for="tanggal" >Tanggal Pelaksanaan</label>
                                            <input readonly="readonly" class="form-input" name="keterangan" id="keterangan"
                                            value="{{ date('d-m-Y' , strtotime($data->tanggal)) }}">
                                        </div>
                                    </div>

                                    <!-- Form Row-->
                                    <div class="row">
                                        <!-- Form Group (Id Anggota)-->
                                        <div class="col-md-12">
                                            <label class="small mb-1 text-gray-900" for="lokasi">Lokasi</label>
                                            <input readonly="readonly" class="form-input" name="lokasi" id="lokasi"
                                            value="{{ $data->lokasi }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Form Group (Nama Ranting)-->
                                        <div class="col-md-12">
                                            <label class="small mb-1 text-gray-900 " for="ranting_id">Ranting</label>
                                            <input readonly="readonly" class="form-input" name="ranting_id" id="ranting_id"
                                            value="{{ $data->ranting }}">
                                        </div>
                                    </div>                                   


                                    <!-- Form Row-->
                                    <div class="row">
                                        <!-- Form Group (Tempat, Tanggal Lahir)-->
                                        <div class="col-md-12">
                                            <label class="small mb-1 text-gray-900" for="keterangan">Keterangan Prohram Kerja</label>
                                            <input readonly="readonly" class="form-input" name="keterangan" id="keterangan"
                                            value="{{ $data->keterangan }}">
                                        </div>
                                    </div>
                                
                                </form>
                            </div>
                        </div>    
          @endforeach
                        <div class="row"> 
                            <div class="col-xl-12">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header text-gray-900">Foto Kegiatan</div>
                                    <div class="card-body text-center" enctype="multipart/form-data">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile mb-2" src="{{ asset ('public/img/kegiatan/'.$data->foto) }}" alt="" width="300" height="250"/>
                                    </div>
                                </div>
                            </div>
                            </div>
                      
                    </div>
                </div>
            </div>
            {{-- /content --}}
        </div>
    </div>  
</div>

<!-- Modal Create -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('update.kegiatan', $data->id)}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="text" class="form-input" name="nama" id="name" placeholder="Nama Kegiatan" value="{{$data->nama}}" />
            </div>
            <div class="form-group">
                <label>Tanggal Pelaksanaan</label>
                <input type="date" class="form-input" name="tanggal" id="tanggal" placeholder="Tanggal Pelaksanaan" value="{{$data->tanggal}}" />
            </div>
            <div class="form-group">
                <label>Penanggung Jawab</label>
                <select class="form-control" name="anggota_id">
                    <option selected value="{{$data->anggota_id}}">{{$data->nama_anggota}}</option>
                    @foreach ($anggota as $agt)
                    <option value="{{$agt->id}}" name="anggota_id" >{{$agt->nama}}</option> 
                    @endforeach
                </select>  
                {{-- <label class="text-gray-900">Ranting</label>
                <input type="text" name="ranting_id" class="form-control"> --}}
            </div>
            <div class="form-group">
                <label>Ranting</label>
                <select class="form-control" name="ranting_id">
                    <option selected value="{{$data->ranting_id}}">{{$data->ranting}}</option>
                    @foreach ($ranting as $rtg)
                    <option value="{{$rtg->id}}" name="ranting_id" >{{$rtg->nama}}</option> 
                    @endforeach
                </select>  
                {{-- <label class="text-gray-900">Ranting</label>
                <input type="text" name="ranting_id" class="form-control"> --}}
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" class="form-input" name="lokasi" id="lokasi" placeholder="Lokasi Pelaksanaan" value="{{$data->lokasi}}" />
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-input" name="foto" id="foto" placeholder="Foto Pelaksanaan"/>
            </div>
            <div class="form-group">
                <label>Keterangan Program Kerja</label>
                <input type="text" class="form-input" name="keterangan" id="keterangan" placeholder="Keterangan Program Kerja" value="{{$data->keterangan}}" />
            </div>
            <div class="card-footer text-right">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Batal</button>
                <button class="btn btn-sm  btn-success mr-1" type="submit">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('page-scripts')
<script>alert(123)</script>
    
@endpush