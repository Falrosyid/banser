@extends('layouts.master')
@section('title','Ranting')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900">Ranting</h1>

    @if(Session::has('sukses'))
    <div class="alert alert-success">
      {{ Session::get('sukses') }}
      @php
      Session::forget('sukses');
      @endphp
    </div>
    @elseif(Session::has('gagal'))
    <div class="alert alert-danger">
      {{ Session::get('gagal') }}
      @php
      Session::forget('gagal');
      @endphp
    </div>
    @endif

     @if(Session::has('hapus'))
    <div class="alert alert-success">
      {{ Session::get('hapus') }}
      @php
      Session::forget('hapus');
      @endphp
    </div>
    @endif
        <!-- Button tambah-->
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
            Tambah Ranting
          </button>
        <!-- <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#modalTambahBarang">Tambah Barang</button> -->
        <!-- <a href="{{ route('tambah.anggota')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Ranting</a> -->
            <hr>
    
       
        <!-- DataTales Example -->
      <div class="card">
        <div class="table-resposive">
            <table class="table table-bordered table-hover table-sm" cellspacing="0">
              <thead align="center"> 
                <tr class="table-success">
                    <th class="text-gray-900" width="5%">No</th>
                    <th class="text-gray-900">Nama</th>
                    <th class="text-gray-900" width="5%">Aksi</th>
                </tr>
              </thead>
              <?php $no = 1; ?>
                    @foreach ($ranting as $data)
              <tbody>
                <tr>      
                    <td class="text-gray-900">{{ $no++ }}</td>
                    <td class="text-gray-900">{{ $data->nama }}</td>
                    <td class="text-center">
                      <a href="{{ route('delete.ranting', $data->id)}}" class="btn btn-sm">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                </tr>
                    @endforeach
              </tbody>     
            </table>
        </div>
        {{$ranting->links()}}
      </div>
          </div>
      </div>


    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Ranting</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('create.ranting')}}" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <input type="nama" class="form-control form-control-user"
                id="nama" name="nama"
                placeholder="Wilayah...">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Batal</button>
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i> Simpan</button>
          </div>
            </form>
        </div>
      </div>
    </div>>

    @endsection
    @push('page-scripts')

    @endpush
  
    

@push('after-scripts')



    
@endpush