@extends('layouts.master')
@section('title','Program Kerja')
@section('content')

<div class="section-body">
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <!-- Page Heading -->
        <div class="card-header">
          <h1 class="h3 mb-2 text-gray-800">Program Kerja</h1>

          <!-- Button tambah-->
          @if(auth()->user()->role == 'admin')
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
            Tambah Proker
          </button>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead style="text-align: center;"> 
                <tr class="table-success">
                  <th class="text-gray-900" width="3%">No</th>
                  <th class="text-gray-900" width="20%">Nama</th>
                  <th class="text-gray-900" width="8%">Tanggal Pelaksanaan</th>
                  <th class="text-gray-900" width="8%">Lokasi</th>
                  <th class="text-gray-900" width="8%">Ranting</th>
                  <th class="text-gray-900" width="32%">Keterangan</th>
                  @if(auth()->user()->role == 'admin' || auth()->user()->role == 'satkoryon')
                  <th class="text-gray-900" width="8%">Action</th>
                  @endif
                </tr>
              </thead>
              <?php $no = 1; ?>
              @foreach ($proker as $key => $data)
              <?php $tgl = $data->tanggal; ?>
              <tbody>
              <tr>      
                <td class="text-gray-900">{{ $no++ }}</td>
                <td class="text-gray-900">{{ $data->nama }}</td>
                <td class="text-gray-900" style="text-align: center;">{{ date('d-m-Y', strtotime($tgl))}}</td>
                <td class="text-gray-900" style="text-align: center;">{{ $data->lokasi }}</td>
                <td class="text-gray-900" style="text-align: center;">{{ $data->nama_ranting }}</td>
                <td class="text-gray-900">{{ $data->keterangan }}</td>
                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'satkoryon')
                <td style="text-align: center;">
                  <a href="{{ route('view.proker', $data->id)}}" data-id="modal" class="btn btn-sm"><i class="fas fa-eye"></i></a>
                  @if(auth()->user()->role == 'admin')
                  <a href="{{ route('edit.proker', $data->id)}}" data-id="modal" class="btn btn-sm"><i class="fas fa-edit"></i></a>
                  <a href="{{ route('delete.proker', $data->id)}}" class="btn btn-sm">
                    <i class="fas fa-trash"></i>
                  </a>
                  @endif
                </td>
                @endif
              </tr>
              @endforeach
            </tbody>   
            </table>
          </div>
          {{$proker->links()}}
        </div> 
      </div>
    </div>
  </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Program Kerja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('simpan.proker')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Proker</label>
            <input type="text" class="form-input" name="nama" id="name" placeholder="Nama Proker"/>
          </div>
          <div class="form-group">
            <label>Tanggal Pelaksanaan</label>
            <input type="date" class="form-input" name="tanggal" id="tanggal" placeholder="Tanggal Pelaksanaan"/>
          </div>
          <div class="form-group">
            <label>Lokasi</label>
            <input type="text" class="form-input" name="lokasi" id="lokasi" placeholder="Lokasi Pelaksanaan"/>
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
            <label>Keterangan Program Kerja</label>
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

@endsection
@push('page-scripts')

@endpush



@push('after-scripts')




@endpush