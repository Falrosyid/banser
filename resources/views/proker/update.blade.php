@extends('layouts.master')
@section('title','Update Program Kerja')
@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-12">
			<div class="card">
				<!-- Page Heading -->
				<div class="card-header">
					<h1 class="h3 mb-4 text-gray-900">Update Program Kerja</h1>
					@foreach($proker as $data)
					<form action="{{ route('update.proker', $data->id)}}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Nama Proker</label>
							<input type="text" class="form-input" name="nama" id="name" placeholder="Nama Proker" value="{{$data->nama}}" />
						</div>
						<div class="form-group">
							<label>Tanggal Pelaksanaan</label>
							<input type="date" class="form-input" name="tanggal" id="tanggal" placeholder="Tanggal Pelaksanaan" value="{{$data->tanggal}}" />
						</div>
						<div class="form-group">
							<label>Lokasi</label>
							<input type="text" class="form-input" name="lokasi" id="lokasi" placeholder="Lokasi Pelaksanaan" value="{{$data->lokasi}}" />
						</div>
						<div class="form-group">
							<label>Ranting</label>
							<select class="form-control" name="ranting_id">
								<option selected value="{{$data->id_ranting}}">{{$data->nama_ranting}}</option>
								@foreach ($ranting as $rtg)
								<option value="{{$rtg->id}}" name="ranting_id" >{{$rtg->nama}}</option> 
								@endforeach
							</select>  
							{{-- <label class="text-gray-900">Ranting</label>
							<input type="text" name="ranting_id" class="form-control"> --}}
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