@extends('layouts.master')
@section('title','Kirim Pesan')
@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-12">
			<div class="card">
				<!-- Page Heading -->
				<div class="card-header">
					<h1 class="h3 mb-4 text-gray-900">Kirim Pesan</h1>

					<form action="{{ route('kirim.pesan')}}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Tujuan</label>

							<div class="row">
								@foreach ($anggota as $agt)
								<div class="col-2">
									<p><input type='checkbox' name='tujuan[]' id="tujuan" value='{{$agt->no_hp}}' /> {{$agt->nama}}</p>
								</div>
								@endforeach
							</div>
							<input class="btn btn-sm btn-success" type="button" onclick="cek(this.form.tujuan)" value="Pilih Semua" />
							<input class="btn btn-sm btn-danger" type="button" onclick="uncek(this.form.tujuan)" value="Hapus Tanda" />
						</div>
						<div class="form-group">
							<label>Isi Pesan</label>
							<input type="text" class="form-input" name="pesan" id="pesan" placeholder="Isi Pean"/>
						</div>
						<div class="card-footer text-right">
							<button class="btn btn-sm  btn-success mr-1" type="submit">kirim</button>
						</div>
					</form>
				</div>  
			</div>
		</div>
	</div>
</div>

<script>
function cek(tujuan){
    for(i=0; i < tujuan.length; i++){
        tujuan[i].checked = true;
    }
}
function uncek(tujuan){
    for(i=0; i < tujuan.length; i++){
        tujuan[i].checked = false;
    }
}
</script>

@endsection

@push('page-scripts')

@endpush