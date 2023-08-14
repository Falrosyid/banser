@extends('layouts.master')
@section('title','Akun')
@section('content')
@foreach($anggota as $data)

<style type="text/css">
	body{
		background: -webkit-linear-gradient(left, #3931af, #00c6ff);
	}
	.profile-img{
		text-align: left;
	}
	.profile-img img{
		width: 240px;
		height: 240px;
		object-fit: cover;
	}
	.profile-head h5{
		color: #333;
	}
	.profile-head h6{
		color: #0062cc;
	}
	.profile-edit-btn{
		border: none;
		border-radius: 1.5rem;
		width: 70%;
		padding: 2%;
		font-weight: 600;
		color: #6c757d;
		cursor: pointer;
	}
	.profile-head .nav-tabs{
		margin-bottom:5%;
	}
	.profile-head .nav-tabs .nav-link{
		font-weight:600;
		border: none;
	}
	.profile-head .nav-tabs .nav-link.active{
		border: none;
		border-bottom:2px solid #0062cc;
	}
	.profile-work{
		text-align: center;
		padding: 2%;
		margin-top: -15%;
	}
	.profile-work p{
		font-size: 12px;
		color: #818182;
		font-weight: 600;
		margin-top: 10%;
	}
	.profile-work a{
		text-decoration: none;
		color: #495057;
		font-weight: 600;
		font-size: 14px;
	}
	.profile-work ul{
		list-style: none;
	}
	.profile-tab label{
		font-weight: 600;
	}
	.profile-tab p{
		font-weight: 600;
		color: #0062cc;
	}
</style>
<!-- Content Row -->

<div class="row">
	<div class="col-xl-12">
		<div class="card-header text-gray-900">{{$data->nama}}
			@if(Session::has('berhasil'))
			<div class="alert alert-success">
				{{ Session::get('berhasil') }}
				@php
				Session::forget('berhasil');
				@endphp
			</div>
			@endif

			@if(Session::has('gagal'))
			<div class="alert alert-success">
				{{ Session::get('gagal') }}
				@php
				Session::forget('gagal');
				@endphp
			</div>
			@endif
		</div>
		<div class="card-body">
			<form method="post" >
				<div class="row">
					<div class="col-md-2">
						<div class="profile-img">
							<img src="{{ asset ('public/img/profil/'.$data->foto) }} "/>
						</div>
						<br>
						{{$data->nama}} <br>
						{{$data->email}}
						{{$data->no_hp}}
					</div>
					<div class="col-md-6">
						<div class="profile-head">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#ktp" role="tab" aria-controls="home" aria-selected="true">KTP</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#kta" role="tab" aria-controls="profile" aria-selected="false">KTA</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#pkd" role="tab" aria-controls="profile" aria-selected="false">PKD</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#sertif" role="tab" aria-controls="profile" aria-selected="false">Riwayat Diklat</a>
								</li>
							</ul>
						</div>
						<div class="tab-content profile-tab" id="myTabContent">
							<div class="tab-pane fade show active" id="ktp" role="tabpanel" aria-labelledby="home-tab">
								<div class="dokumen text-center" >
									<img class="img-account-profile mb-2" src="{{ asset ('public/img/ktp/'.$data->ktp) }}" style="width: 320px; text-align: center;" />
								</div>
								<hr>
								<div class="row">
									<div class="col-md-6">
										<label>Nama</label>
									</div>
									<div class="col-md-6">
										<p>{{$data->nama}}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>NIK</label>
									</div>
									<div class="col-md-6">
										<p>{{$data->nik}}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Tempat, Tanggal Lahir</label>
									</div>
									<div class="col-md-6">
										<p>{{$data->tp_lahir}}, {{$data->tgl_lahir}}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Alamat</label>
									</div>
									<div class="col-md-6">
										<p>{{$data->alamat}}</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="kta" role="tabpanel" aria-labelledby="profile-tab">
								<div class="text-center">
									<img class="img-account-profile mb-2" src="{{ asset ('public/img/kta/'.$data->kta) }}" alt="" width="320" height="240"/>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-6">
										<label>Nama</label>
									</div>
									<div class="col-md-6">
										<p>{{$data->nama}}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Nomor Anggota</label>
									</div>
									<div class="col-md-6">
										<p>{{$data->no_anggota}}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Tinggi Badan</label>
									</div>
									<div class="col-md-6">
										<p>{{$data->tg_badan}}cm</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Ranting</label>
									</div>
									<div class="col-md-6">
										<p>{{$data->ranting}}</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="pkd" role="tabpanel" aria-labelledby="profile-tab">
								<div class="text-center">
									<img class="img-account-profile mb-2" src="{{ asset ('public/img/pkd/'.$data->pkd) }}" alt="" width="320" height="240"/>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-6">
										<label>Nama</label>
									</div>
									<div class="col-md-6">
										<p>{{$data->nama}}</p>
									</div>
									<div class="col-md-6">
										<label>Jenis Sertifikat</label>
									</div>
									<div class="col-md-6">
										<p>Pelatihan Kepemimpinan Dasar</p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="sertif" role="tabpanel" aria-labelledby="profile-tab">
								<div class="col-xl-12">
									<button type="button" class="btn btn-success text-center" data-toggle="modal" data-target="#exampleModalCenter" style="width: 100%;">
										Tambah Riwayat Diklat
									</button>
								</div>
								<br>
								<hr>
								<br>
								<div class="row">
									@foreach($sertifikat as $sertif)
									<div class="col-sm-4">
										<img class="img-account-profile mb-2" src="{{ asset ('public/img/sertifikat/'.$sertif->foto) }}" width="160" height="120" style="margin-left: auto; margin-right: auto; display: block;" >
										<hr>
										<h5 class="text-center">{{$sertif->nama}}</h5>
										<h6 class="text-center">{{$sertif->tanggal}}</h6>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<a href="{{route('profile.setting', $data->remember_token)}}"  class="btn btn-outline-secondary" >Edit Profile</a>
						<!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">

					</div>
					<div class="col-md-8">

					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Tambah Riwayat Diklat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('create.sertifikat', $data->remember_token)}}" method="POST"  enctype="multipart/form-data">
					{{ csrf_field() }}
					<table class="field_wrapper" width="100%;" style="margin-top: 50px;">
						<tr class="sertifikat">
							<td>Sertifikat Diklat</td>
							<td>:</td>
							<td>
								<input type="text" class="form-input" name="sertifikat_nama[]" placeholder="Nama Sertifikat Diklat">
							</td>
							<td>
								<a class="btn" href="javascript:void(0);" id="add_button" title="Add field"><i class="fas fa-plus-circle"></i></a>
							</td>
						</tr>
						<tr class="sertifikat">
							<td></td>
							<td>:</td>
							<td><input type="date" class="form-input" name="sertifikat_tgl[]" placeholder="Tanggal"></td>
						</tr>
						<tr class="sertifikat">
							<td></td>
							<td>:</td>
							<td><input type="text" class="form-input" name="sertifikat_tpt[]" placeholder="Tempat Diklat"></td>
						</tr>
						<tr class="sertifikat">
							<td></td>
							<td>:</td>
							<td><input type="file" class="form-input" name="sertifikat[]" placeholder="Upload File" required="required"></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Batal</button>
					<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
                var maxField = 10; //Input fields increment limitation
                var addButton = $('#add_button'); //Add button selector
                var wrapper = $('.field_wrapper'); //Input field wrapper
                var fieldHTML = '<tr class="sertifikat add" id="sertifikat_nama">';
                fieldHTML=fieldHTML + '<td>Sertifikat Lainnya</td>';
                fieldHTML=fieldHTML + '<td>:</td>';
                fieldHTML=fieldHTML + '<td><input type="text" class="form-input" name="sertifikat_nama[]" placeholder="Nama Sertifikat Diklat"></td>';
                fieldHTML=fieldHTML + '</tr>'; 

                fieldHTML=fieldHTML + '<tr class="sertifikat add" id="sertifikat_tgl">'; 
                fieldHTML=fieldHTML + '<td></td>';
                fieldHTML=fieldHTML + '<td>:</td>';
                fieldHTML=fieldHTML + '<td><input type="date" class="form-input" name="sertifikat_tgl[]" placeholder="Tanggal"></td>';
                fieldHTML=fieldHTML + '</tr>';

                fieldHTML=fieldHTML + '<tr class="sertifikat add" id="sertifikat_tpt">'; 
                fieldHTML=fieldHTML + '<td></td>';
                fieldHTML=fieldHTML + '<td>:</td>';
                fieldHTML=fieldHTML + '<td><input type="text" class="form-input" name="sertifikat_tpt[]" placeholder="Tempat Diklat"></td>';
                fieldHTML=fieldHTML + '</tr>'; 

                fieldHTML=fieldHTML + '<tr class="sertifikat add" id="sertifikat">'; 
                fieldHTML=fieldHTML + '<td></td>';
                fieldHTML=fieldHTML + '<td>:</td>';
                fieldHTML=fieldHTML + '<td><input type="file" class="form-input" name="sertifikat[]" id="sertifikat" placeholder="Upload File" required="required"></td>';
                fieldHTML=fieldHTML + '<td><a href="javascript:void(0);" class="remove_button btn"><i class="fas fa-minus-circle"></i></a></div></td>';
                fieldHTML=fieldHTML + '</tr>'; 
                var x = 1; //Initial field counter is 1

                //Once add button is clicked
                $(addButton).click(function(){
                    //Check maximum number of input fields
                    if(x < maxField){ 
                        x++; //Increment field counter
                        $(wrapper).append(fieldHTML); //Add field html
                    }
                });

                //Once remove button is clicked
                $(wrapper).on('click', '.remove_button', function(e){
                	e.preventDefault();
                    $("#sertifikat_nama").remove(); //Remove field html
                    $("#sertifikat_tgl").remove(); //Remove field html
                    $("#sertifikat_tpt").remove(); //Remove field html
                    $("#sertifikat").remove(); //Remove field html
                    x--; //Decrement field counter
                });
            });
        </script>

        @endforeach
        @endsection
