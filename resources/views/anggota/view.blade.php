@extends('layouts.master')
@section('title', 'Profil Anggota Banser' )
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-900">PROFIL ANGGOTA BANSER</h1>
            <hr>
            
            {{-- content --}}
            <div class="container-xl px-4 mt-4">
                <!-- Account page navigation-->

                <div class="row">
                    <div class="col-xl-4">
                        @foreach ($anggota as $data)
                        <?php $lahir = $data->tgl_lahir; ?>
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header text-gray-900">Foto Anggota</div>
                            <div class="card-body text-center" enctype="multipart/form-data">
                                <!-- Profile picture image-->
                                <img class="img-account-profile mb-2" src="{{ asset ('public/img/profil/'.$data->foto) }}" alt="" width="250px" height="300px"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            @foreach($cek as $key)
                            @endforeach
                            <?php if ($key->user_id == null): ?>
                                <div class="card-header text-gray-900">Identitas {{$data->nama}}
                                    <?php else: ?>
                                        <div class="card-header text-gray-900">Identitas {{$data->nama}} ({{$data->role}})
                                        <?php endif ?>
                                        <a href="{{ route('edit.anggota',$data->id) }}" class="btn btn-sm" style="float: right;"><i class="fas fa-edit" ></i></a>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">

                                            <!-- Form Group (Nama Lengkap)-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="small mb-1 text-gray-900 " for="nama_lengkap" >Nama Lengkap</label>
                                                    <input readonly="readonly" class="text-gray-900 form-control-range" name="nama_lengkap" id="nama_lengkap"
                                                    value="{{ $data->nama }}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-900 " for="nama_lengkap" >NIK</label>
                                                    <input readonly="readonly" class="text-gray-900 form-control-range" name="nama_lengkap" id="nama_lengkap"
                                                    value="{{ $data->nik }}">
                                                </div>

                                                <!-- Form Group (Id Anggota)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-900" for="id_anggota">No Anggota</label>
                                                    <input readonly="readonly" class="text-gray-900 form-control-range" name="id_anggota" id="id_anggota"
                                                    value="{{ $data->no_anggota }}">
                                                </div>
                                            </div>

                                            <!-- Form Row-->
                                            <div class="row">
                                                <!-- Form Group (Nama Ranting)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-900 " for="ranting_id">Ranting</label>
                                                    <input readonly="readonly" class="text-gray-900 form-control-range" name="ranting_id" id="ranting_id"
                                                    value="{{ $data->ranting }}">
                                                </div>

                                                <!-- Form Group (Tinggi Badan)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-900 " for="tg_badan">Tinggi Badan</label>
                                                    <input readonly="readonly" class="text-gray-900 form-control-range" name="tg_badan" id="tg_badan"
                                                    value="{{ $data->tg_badan }} cm">
                                                </div>
                                            </div>

                                            <!-- Form Row-->
                                            <div class="row">
                                                <!-- Form Group (Tempat, Tanggal Lahir)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-900" for="ttl">Tempat, tanggal lahir</label>
                                                    <input readonly="readonly" class="text-gray-900 form-control-range" name="ttl" id="ttl"
                                                    value="{{ $data->tp_lahir }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_lahir)->format('d-m-Y') }}">
                                                </div>
                                                <!-- Form Group (Alamat)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-900" for="no_hp">No. Handphone</label>
                                                    <input readonly="readonly" class="text-gray-900 form-control-range" name="no_hp" id="no_hp"
                                                    value="{{ $data->no_hp }}">
                                                </div>
                                            </div>

                                            <!-- Form Group (Alamat)-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-900 "for="alamat">Alamat</label>
                                                    <textarea readonly="readonly" class="text-gray-900 form-control-range" name="alamat" 
                                                    id="alamat">{{ $data->alamat }}</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1 text-gray-900 "for="alamat">Status ({{$data->status}})</label>
                                                    <br>
                                                    <?php if ($data->status == 'Aktif'): ?>
                                                        <a class="btn btn-danger" href="{{ route('nonaktikan', $data->id)}}" style="width: 100%;">Nonaktifkan</a>
                                                    <?php else: ?>
                                                            <a class="btn btn-success" href="{{ route('aktivasi', $data->id)}}" style="width: 100%;">Aktifkan</a>
                                                <?php endif ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">    
                                        <?php if (auth()->user()->role == 'admin'): ?>

                                        <?php if ($data->user_id == null): ?>
                                            <hr>
                                            <a class="btn btn-sm btn-success" href="{{ route('terima', $data->id)}}" style="float: right;">Terima</a>
                                            &nbsp;
                                            <a class="btn btn-sm btn-danger" href="{{ route('tolak', $data->id)}}" style="float: right; margin-right: 10px;">Tolak</a>
                                            <?php else: ?>
                                                
                                                <?php if ($data->role == 'anggota' ): ?>
                                                    <div class="form-group">
                                                        <a class="btn btn-success" href="{{ route('ubah.satkoryon', $data->remember_token)}}" style="float: right;">Jadikan Satkoryon</a>
                                                    </div>
                                                    <?php else: ?>
                                                        <div class="form-group">
                                                            <a class="btn btn-danger" href="{{ route('ubah.anggota', $data->remember_token)}}" style="float: right;">Hapus Satkoryon</a>
                                                        </div>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-xl-6">
                                    <!-- Profile picture card-->
                                    <div class="card mb-4 mb-xl-0">
                                        <div class="card-header text-gray-900">KTP</div>
                                        <div class="card-body text-center" enctype="multipart/form-data">
                                            <!-- Profile picture image-->
                                            <img class="img-account-profile mb-2" src="{{ asset ('public/img/ktp/'.$data->ktp) }}" alt="" width="300" height="250"/>
                                            <hr>
                                            <h5 class="text-center">{{$data->nama}}</h5>
                                            <h6 class="text-center">NIK ({{$data->nik}})</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <!-- Profile picture card-->
                                    <div class="card mb-4 mb-xl-0">
                                        <div class="card-header text-gray-900">PKD</div>
                                        <div class="card-body text-center" enctype="multipart/form-data">
                                            <!-- Profile picture image-->
                                            <img class="img-account-profile mb-2" src="{{ asset ('public/img/pkd/'.$data->pkd) }}" alt="" width="300" height="250"/>
                                            <hr>
                                            <h5 class="text-center">{{$data->nama}}</h5>
                                            <h6 class="text-center">Ranting ({{$data->ranting}})</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-xl-6">
                                    <!-- Profile picture card-->
                                    <div class="card mb-4 mb-xl-0">
                                        <div class="card-header text-gray-900">KTA</div>
                                        <div class="card-body text-center" enctype="multipart/form-data">
                                            <!-- Profile picture image-->
                                            <?php if ($data->kta == null): ?>
                                                <span style="margin-left: auto; margin-right: auto; display: block;">Tidak Ada KTA</span>
                                                <?php else: ?>
                                            <img class="img-account-profile mb-2" src="{{ asset ('public/img/kta/'.$data->kta) }}" alt="" width="300" height="250" style="margin-left: auto; margin-right: auto; display: block;"/>
                                            <hr>
                                            <h5 class="text-center">{{$data->nama}}</h5>
                                            <h6 class="text-center">No. Anggota ({{$data->no_anggota}})</h6>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <!-- Profile picture card-->
                                    <div class="card mb-4 mb-xl-0">
                                        <div class="card-header text-gray-900">Surat Rekom</div>
                                        <div class="card-body text-center" enctype="multipart/form-data">
                                            <?php if ($data->rekom == null): ?>
                                                <span style="margin-left: auto; margin-right: auto; display: block;">Tidak Ada Surat Rekom</span>
                                                <?php else: ?>
                                                    <!-- Profile picture image-->
                                                    <img class="img-account-profile mb-2" src="{{ asset ('public/img/rekom/'.$data->rekom) }}" alt="" width="300" height="250"/>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    

                            @endforeach

                            {{-- /content --}}
                        </div>
                    </div>  
                </div>

                @endsection

                @push('page-scripts')
                <script>alert(123)</script>

                @endpush