@extends('layouts.master')
@section('title','Tambah Kegiatan')
@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-12">
			<div class="card">
				<!-- Page Heading -->
				<div class="card-header">
					<h1 class="h3 mb-4 text-gray-900">Tambah Kegiatan</h1>

					<form action="{{ route('simpan.kegiatan')}}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Nama Kegiatan</label>
							<input type="text" class="form-input" name="nama" id="name" placeholder="Nama Kegiatan"/>
						</div>
						<div class="form-group">
							<label>Tanggal Pelaksanaan</label>
							<input type="date" class="form-input" name="tanggal" id="tanggal" placeholder="Tanggal Pelaksanaan"/>
						</div>
						<div class="form-group">
							<label>Penanggung Jawab</label>
							<select class="form-control" name="anggota_id">
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
								@foreach ($ranting as $data)
								<option value="{{$data->id}}" name="ranting_id" >{{$data->nama}}</option> 
								@endforeach
							</select>  
							{{-- <label class="text-gray-900">Ranting</label>
							<input type="text" name="ranting_id" class="form-control"> --}}
						</div>
						<div class="form-group">
							<label>Lokasi</label>
							<input type="text" class="form-input" name="lokasi" id="lokasi" placeholder="Lokasi Pelaksanaan"/>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" class="form-input" name="foto" id="foto" placeholder="Lokasi Pelaksanaan"/>
						</div>
						<div class="form-group">
							<label>Keterangan Kegiatan</label>
							<input type="text" class="form-input" name="keterangan" id="keterangan" placeholder="Keterangan Program Kerja"/>
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
</div>

@endsection

@push('page-scripts')

@endpush