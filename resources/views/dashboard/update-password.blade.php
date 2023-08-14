@extends('layouts.master')
@section('title','Perbarui Password')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card ">
                <!-- Page Heading -->
                <div class="card-header">
                  <h1 class="h3 mb-4 text-gray-900">Memperbarui Password</h1>
                
                <!-- DataTales Example -->
                <div class="card">
                   <div class="card-body">
                    @foreach($user as $data)
                    <form action="{{ route('password.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if(Session::has('gagal'))
                        <div class="alert alert-danger">
                        	{{ Session::get('gagal') }}
                        	@php
                        	Session::forget('gagal');
                        	@endphp
                        </div>
                        @elseif(Session::has('beda'))
                        <div class="alert alert-danger">
                        	{{ Session::get('beda') }}
                        	@php
                        	Session::forget('beda');
                        	@endphp
                        </div>
                        @endif
                        <table width="100%;" style="margin-top: 50px;"> 
                            <tr>
                                <td>Password Lama</td>
                                <td>:</td>
                                <td>
                                    <input type="password" class="form-input" name="old_pswd" id="old_pswd" placeholder="Masukkan Password Lama" required="required"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Password Baru</td>
                                <td>:</td>
                                <td>
                                    <input type="password" class="form-input" name="new_pswd" id="new_pswd" placeholder="Masukkan Password Baru" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Ulangi Password</td>
                                <td>:</td>
                                <td>
                                    <input type="password" class="form-input" name="rpt_pswd" id="rpt_pswd" placeholder="Ulangi Password" required="required"/>
                                </td>
                            </tr>
                        </table>
                        @endforeach
                        <hr>
                        <div class="card-footer text-right">
                            <button class="btn btn-success mr-1" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>
</div>
</div>

@endsection

@push('page-scripts')

@endpush