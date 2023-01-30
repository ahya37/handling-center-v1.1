@extends('layouts.app')
@push('styles')
{{-- <link rel="stylesheet" href="{{asset('/vendor/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('vendor/datatables/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
{{-- <link rel="stylesheet" href="{{asset('vendor/font-awesome/all.min.css')}}" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" /> --}}

@endpush
@section('content')
<div class="page-wrapper">
        <div class="page-content">
        @include('layouts.message')
				<h6 class="mb-0 ">Kuisioner Pembimbing Umrah</h6>
				<hr/>
				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											<h6><b>{{$kuisioner->label}}</b></h6>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2"><h6>Tourcode</h6></div>
										<div class="col-md-10">
											<h6 class="text-success">: {{$kuisioner->tourcode}}</h6>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2"><h6>Pembimbing</h6></div>
										<div class="col-md-10">
											<h6>: {{$kuisioner->pembimbing}}</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8"><h6>Jumlah Jama'ah</h6></div>
										<div class="col-md-2">
											<h6 class="text-success">: <b>{{$kuisioner->count_jamaah}}</b></h6>
										</div>
										<div class="col-md-8"><h6>Jumlah Responden</h6></div>
										<div class="col-md-2">
											<h6 class="text-success">: <b>{{$kuisioner->jumlah_responden}}</b></h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<h5>Pilihan</h5>
					</div>
					@php
						$no_pertanyaan = 1;
					@endphp
					@foreach ($result_kuisioner as $item)
					<div class="col-md-8">
						<div class="card">
							<div class="card-header"><b>{{$item['nomor']}}. {{$item['isi']}}</b></div>
							<div class="card-body">
								@php
									$no_jawaban = 1;
									$no_jawaban_rumus = 1;
								@endphp
								{{-- <div class="row">
									<div class="col-md-2">{{$no_jawaban++}}. {{$val->jawaban}}</div>
									<div class="col-md-2"><span>{{$val->jml_jawaban}}</span></div>
								</div> --}}
								<table class="table">
									<tr>
										<th class="col-md-1">No</th>
										<th class="col-md-2">Jawaban</th>
										<th class="col-md-2">Jumlah</th>
										<th class="col-md-2">Rata-Rata</th>
										<th class="col-md-2">Nilai</th>
									</tr>
									@foreach ($item['jawaban'] as $val)
									@php
										$avg = ceil($val->jml_jawaban/$kuisioner->count_jamaah*100);
										$v   = $gf->generateNilaiKuisioner($no_jawaban_rumus++)
									@endphp
									<tr>
										<td>{{$no_jawaban++}}</td>
										<td>{{$val->jawaban}}</td>
										<td>{{$val->jml_jawaban}}</td>
										<td>-</td>
										<td>-</td>
									</tr>
									@endforeach
								</table>
							</div>
						</div>
					</div>
					@endforeach
				</div>

				<div class="row">
					<div class="col-md-12">
						<h5>Essay</h5>
					</div>
					
					<div class="col-md-12">
						<div class="card">
							<div  class="card-body">
								@php
									$no_essay = 1;
								@endphp
								@foreach ($result_kuisioner_essay as $item)
									<div class="card-header"><b>{{$item['isi']}}</b></div>
									<table class="table">
										<tr>
											<th>No</th>
											<th>Jawaban</th>
										</tr>
										@foreach ($item['jawaban'] as $val)
										<tr>
											<td>{{$no_essay++}}</td>
											<td>{{$val->essay}}</td>
										</tr>
										@endforeach
									</table>

								@endforeach
							</div>
						</div>
					</div>

				</div>
    </div>
</div>
@endsection
{{-- @push('scripts')

<script src="{{asset('/vendor/datatables/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/vendor/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/vendor/datatables/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/vendor/datatables/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('sweetalert2/dist/new/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script src="{{asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js')}}" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{asset('vendor/daterangepicker/daterangepicker.min.js')}}"></script>
<script src="{{ asset('/js/activitas-umrah.js') }}"></script>
@endpush --}}