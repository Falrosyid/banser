@extends('layouts.master')
@section('title','Update Kegiatan')
@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-12">
			<div class="card">
				<!-- Page Heading -->
				<div class="card-header">
					<h1 class="h3 mb-4 text-gray-900">Update Kegiatan</h1>
					@foreach($kegiatan as $data)
					<form action="/kegiatan/{{$data->id}}/update" method="POST" enctype="multipart/form-data">
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
					@endforeach
				</div>  
			</div>
		</div>
	</div>
</div>

@endsection

@push('page-scripts')

@endpush