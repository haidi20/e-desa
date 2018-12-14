@extends('_layouts.default')

@section('script-top')
<link rel="stylesheet" href="{{asset('robust/app-assets/css/plugins/forms/validation/form-validation.min.css')}}">
@endsection

@section('script-bottom')
<script src="{{asset('robust/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"> </script>
<script src="{{asset('robust/app-assets/js/scripts/forms/validation/form-validation.min.js')}}"> </script>
<script src="{{asset('js/backend.js')}}"> </script>
@endsection

@section('content')
<div class="content-header">
    <div class="row">
        <div class="col-md-6 ">
            {{-- @include('_layout.breadcrumb') --}}
        </div>
        <div class="col-md-6">
            <a href="{{ url('kematian') }}" class="btn btn-secondary float-md-right mt-0">
            	<i class="icon-reply3"></i> Back
            </a>
        </div>
    </div>
</div>
<div class="content-body">
	<section class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-square-controls">Form Kematian</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">

						{{-- {!! Form::open(['class' => 'form form-horizontal', 'novalidate']) !!} --}}
						<form action="{{$action}}" method="post" class="form form-hotizontal">
							<input type="hidden" name="_method" value="{{$method}}">
          					{{ csrf_field() }}
							<div class="form-body pt-1">

								<div class="form-group row position-relative">
									<label for="penduduk_id" class="col-md-2 label-control">NIK Penduduk</label>
									<div class="col-md-10">
										<select class="form-control select2" name="penduduk_id" required>
											<option value="">Pilih NIK Penduduk</option>
											@foreach($penduduk as $index => $item)
												<option value="{{$item->id}}" {{terpilih($item->id, 'penduduk_id')}}>{{$item->nik}} / {{$item->nama}}</option>
											@endforeach
										</select>
										<div class="form-control-position">
			                                <i class="icon-spinner2 spinner" id="spinner-item" style="display: none;"></i>
			                            </div>
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row ">
									<label for="tempat" class="col-md-2 label-control">Tempat Kematian</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="tempat" required value="{{ old('tempat') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row ">
									<label for="tanggal" class="col-md-2 label-control">Tanggal Kematian</label>
									<div class="col-md-10">
										<input type="date" class="form-control" name="tanggal" required value="{{ old('tanggal') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row ">
									<label for="alasan" class="col-md-2 label-control">Alasan</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="alasan" required value="{{ old('alasan') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<hr>

								<div class="offset-md-2">
									<button type="submit" class="btn btn-primary">
										<i class="icon-save"></i> Save
									</button>
								</div>
							</div>
						{{-- {!! Form::close() !!} --}}

					</div>
				</div>
			</div>
		</div>
	</section>

</div>
@endsection
