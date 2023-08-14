@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

@if(Session::has('sukses'))
<div class="alert alert-success">
	{{ Session::get('sukses') }}
	@php
	Session::forget('sukses');
	@endphp
</div>
@endif
<!-- Content Row -->
<div class="row">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						@if(auth()->user()->role == 'anggota')
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						Total Anggota (Ranting)</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$agt}}</div>
						@else
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						Total Anggota</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$anggota}}</div>
						@endif
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
						Ranting</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$ranting}}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info  shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
						kegiatan</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$kegiatan}}</div>
					</div>
					<div class="col-auto">
						<i class="far fa-calendar-alt fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
						Progarm Kerja</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$proker}}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-file-contract fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
