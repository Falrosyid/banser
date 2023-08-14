@extends('layouts.master')
@section('title','Anggota')
@section('content')

<div class="section-body">
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <!-- Page Heading -->
        <div class="card-header">
          <h1 class="h3 mb-2 text-gray-800">Anggota</h1>

          <!-- Button tambah-->
          @if(auth()->user()->role == 'admin')
          <a href="{{ route('tambah.anggota')}}" class="btn btn-icon icon-left btn-success btn-sm">Tambah Anggota</a>
          @endif


          <!-- DataTales Example -->
          @if(Session::has('terima'))
          <div class="alert alert-success">
            {{ Session::get('terima') }}
            @php
            Session::forget('terima');
            @endphp
          </div>
          @endif

        </div>  
        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'satkoryon')
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
              <thead> 
                <tr class="table-success">
                  <th class="text-gray-900">No</th>
                  <th class="text-gray-900">No Anggota</th>
                  <th class="text-gray-900">Nama Anggota</th>
                  <th class="text-gray-900">Anggota Ranting</th>
                  <th class="text-gray-900">Tempat Lahir</th>
                  <th class="text-gray-900">Tanggal Lahir</th>
                  <th class="text-gray-900">No. Hp</th>
                  <th class="text-gray-900" width="8%">Status</th>
                  <th class="text-gray-900" width="8%">Action</th>
                </tr>
              </thead>
              @foreach ($anggota as $no => $data)
              <tbody>
                <tr>      
                  <td class="text-gray-900">{{ $anggota->firstItem()+$no }}</td>
                  <td class="text-gray-900">{{ $data->no_anggota }}</td>
                  <td class="text-gray-900">{{ $data->nama }}</td>
                  <td class="text-gray-900">{{ $data->nama_ranting}}</td>
                  <td class="text-gray-900">{{ $data->tp_lahir }}</td>
                  <td class="text-gray-900">{{ date('d-m-Y', strtotime($data->tgl_lahir)) }}</td>
                  <td class="text-gray-900">{{ $data->no_hp }}</td>
                  <td class="text-gray-900" align="center">
                    @if($data->user_id == null)
                    <span class="badge badge-warning">Belum Registrasi</span>
                    @elseif($data->status == 'Aktif')
                    <span class="badge badge-success">{{$data->status}}</span>
                    @else
                    <span class="badge badge-danger">{{$data->status}}</span>
                    @endif
                    
                    <td>
                      <a href="{{ route('view.anggota', $data->id )}}" data-id="modal" class="btn btn-sm"><i class="fas fa-eye"></i></a>
                      @if(auth()->user()->role == 'admin')
                      <a href="{{ route('edit.anggota',$data->id) }}" data-id="modal" class="btn btn-sm"><i class="fas fa-edit"></i></a>
                      <a href="javascript:;" data-toggle="modal" onclick="deleteData( {{ $data->id }} )" data-target="#DeleteModal"> 
                        <button class="btn btn-sm"> <i class="fas fa-trash"></i> </button>
                      </a>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{$anggota->links()}}
          </div>
          @endif

          @if(auth()->user()->role == 'anggota')
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead> 
                  <tr class="table-success">
                    <th class="text-gray-900">No</th>
                    <th class="text-gray-900">No Anggota</th>
                    <th class="text-gray-900">Nama Anggota</th>
                    <th class="text-gray-900">Anggota Ranting</th>
                    <th class="text-gray-900">Tempat Lahir</th>
                    <th class="text-gray-900">Tanggal Lahir</th>
                    <th class="text-gray-900">No. Hp</th>
                  </tr>
                </thead>
                @foreach ($agt as $no => $data)
                <tbody>
                  <tr>      
                    <td class="text-gray-900">{{ $anggota->firstItem()+$no }}</td>
                    <td class="text-gray-900">{{ $data->no_anggota }}</td>
                    <td class="text-gray-900">{{ $data->nama }}</td>
                    <td class="text-gray-900">{{ $data->nama_ranting}}</td>
                    <td class="text-gray-900">{{ $data->tp_lahir }}</td>
                    <td class="text-gray-900">{{ date('d-m-Y', strtotime($data->tgl_lahir)) }}</td>
                    <td class="text-gray-900">{{ $data->no_hp }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{$anggota->links()}}
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>


</div>
{{-- modal konfimari hapus --}}

<div id="DeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    {{-- modal content --}}
    <form action="" id="deleteForm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Anggota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}
          {{ method_field('POST') }}
          <p>Apakah anda yakin ingin menghapus data anggota ?</p>
          <button type="button" class="btn btn-secondary btn-sm float-right m-2" data-dismiss="modal">Tidak, tutup</button>
          <button type="submit" name="" class="btn btn-danger btn-sm float-right m-2" data-dismiss="modal" onclick="formSubmit()">
          Ya, hapus</button>
        </div>
      </div>
    </form>
  </div>
</div>




{{-- record hapus --}}
<script type="text/javascript">
  function deleteData(id) {
   var id = id;
   var url = '{{route("delete.anggota", ":id") }}';
   url = url.replace(':id', id);
   $("#deleteForm").attr('action', url);
 }

 function formSubmit() {
  $("#deleteForm").submit();
}
</script>

@endsection
@push('page-scripts')

@endpush



@push('after-scripts')




@endpush