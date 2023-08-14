@extends('layouts.master')
@section('title','Kegiatan Banser')
@section('content')

<div class="section-body">
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <!-- Page Heading -->
        <div class="card-header">
          <h1 class="h3 mb-2 text-gray-800">Kegiatan</h1>

          <!-- Button tambah-->
          @if(auth()->user()->role == 'admin')
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
            Tambah Kegiatan
          </button>
          @endif
        </div>
        <div class="card-body">
          <form action="{{ route('search.kegiatan')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-2">
              <label>Tanggal Awal</label>
              <br>
              <input type="date" name="awal">
              </div>
              <div class="col-sm-3">
                <label>Tanggal akhir</label> 
                <br>
                <input type="date" name="akhir">
                <button type="submit" class="btn btn-light" style="margin-left: 5%"><i class="fa fa-search"></i></button>
                <a href="{{ route('kegiatan')}}" class="btn btn-light" style="margin-left: 5%"><i class="fas fa-sync-alt"></i></a>
              </div>
            </div>
          </form>
          <br>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead style="text-align: center;"> 
                <tr class="table-success">
                  <th class="text-gray-900" width="3%">No</th>
                  <th class="text-gray-900" width="20%">Nama Kegiatan</th>
                  <th class="text-gray-900" width="8%">Tanggal</th>
                  <th class="text-gray-900" width="15%">Nama Penanggung jawab</th>
                  <th class="text-gray-900" width="8%">Ranting</th>
                  <th class="text-gray-900" width="8%">Lokasi Kegiatan</th>
                  <th class="text-gray-900" width="25%">Keterangan</th>
                  @if(auth()->user()->role == 'admin' || auth()->user()->role == 'satkoryon')
                  <th class="text-gray-900" width="10%">Action</th>
                  @endif
                </tr>
              </thead>
              <?php $no = 1; ?>
              @foreach ($kegiatan as $key)
              <tbody>
                <tr>      
                  <td class="text-gray-900">{{ $no++ }}</td>
                  <td class="text-gray-900">{{ $key->nama }}</td>
                  <td class="text-gray-900" style="text-align: center;">{{ date('d-m-Y', strtotime($key->tanggal))}}</td>
                  <td class="text-gray-900" style="text-align: center;">{{ $key->nama_anggota }}</td>
                  <td class="text-gray-900" style="text-align: center;">{{ $key->ranting }}</td>
                  <td class="text-gray-900" style="text-align: center;">{{ $key->lokasi }}</td>
                  <td class="text-gray-900">{{ $key->keterangan }}</td>
                  @if(auth()->user()->role == 'admin' || auth()->user()->role == 'satkoryon')
                  <td style="text-align: center;">
                    <a href="{{ route('view.kegiatan', $key->id)}} " data-id="modal" class="btn btn-sm"><i class="fas fa-eye"></i></a>
                    @if(auth()->user()->role == 'admin')
                    <a href="{{ route('edit.kegiatan', $key->id)}}" data-id="modal" class="btn btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('delete.kegiatan', $key->id)}}" class="btn btn-sm">
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
          {{$kegiatan->links()}}
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('simpan.kegiatan')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Kegiatan</label>
            <input type="text" class="form-input" name="nama" id="name" placeholder="Nama Kegiatan" required="required"/>
          </div>
          <div class="form-group">
            <label>Tanggal Pelaksanaan</label>
            <input type="date" class="form-input" name="tanggal" id="tanggal" placeholder="Tanggal Pelaksanaan" required="required"/>
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
            <input type="text" class="form-input" name="lokasi" id="lokasi" placeholder="Lokasi Pelaksanaan" required="required"/>
          </div>
          <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-input" name="foto" id="foto" placeholder="Foto" required="required"/>
          </div>
          <div class="form-group">
            <label>Keterangan Kegiatan</label>
            <input type="text" class="form-input" name="keterangan" id="keterangan" placeholder="Keterangan Program Kerja" required="required"/>
          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Batal</button>
            <button class="btn btn-sm  btn-success mr-1" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @endsection
  @push('page-scripts')

  @endpush



  @push('after-scripts')




  @endpush