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
            <a href="{{ url('penduduk') }}" class="btn btn-secondary float-md-right mt-0">
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
					<h4 class="card-title" id="basic-layout-square-controls">Form Penduduk</h4>
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
							<div class="form-body pt-1">

								<div class="form-group row ">
									<label for="nik" class="col-md-2 label-control">NIK</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="nik" required value="{{ old('nik') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row ">
									<label for="nama" class="col-md-2 label-control">Nama</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="nama" required value="{{ old('nama') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row ">
									<label for="tempat_lahir" class="col-md-2 label-control">Tempat Lahir</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="tempat_lahir" required value="{{ old('tempat_lahir') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row ">
									<label for="tanggal_lahir" class="col-md-2 label-control">Tanggal Lahir</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row position-relative has-icon-left">
									<label for="name" class="col-md-2 label-control">Jenis Kelamin</label>
									<div class="col-md-10">
										<select class="form-control items" name="po_detail_id" required>
											<option value="">Pilih Jenis Kelamin</option>
											<option value="">Laki - Laki</option>
											<option value="">Perempuan</option>
										</select>
										<div class="form-control-position">
			                                <i class="icon-spinner2 spinner" id="spinner-item" style="display: none;"></i>
			                            </div>
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row position-relative has-icon-left">
									<label for="name" class="col-md-2 label-control">Nama Dusun</label>
									<div class="col-md-10">
										<select class="form-control items" name="po_detail_id" required>
											<option value="">Pilih Nama Dusun</option>
										</select>
										<div class="form-control-position">
			                                <i class="icon-spinner2 spinner" id="spinner-item" style="display: none;"></i>
			                            </div>
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row ">
									<label for="tanggal_lahir" class="col-md-2 label-control">RT</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="tanggal_lahir" required value="{{ old('rt') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row ">
									<label for="tanggal_lahir" class="col-md-2 label-control">RW</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="tanggal_lahir" required value="{{ old('rw') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row ">
									<label for="tanggal_lahir" class="col-md-2 label-control">keluarahan</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="tanggal_lahir" required value="{{ old('keluarahan') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row ">
									<label for="tanggal_lahir" class="col-md-2 label-control">kecamatan</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="tanggal_lahir" required value="{{ old('kecamatan') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row position-relative has-icon-left">
									<label for="name" class="col-md-2 label-control">Agama</label>
									<div class="col-md-10">
										<select class="form-control items" name="po_detail_id" required>
											<option value="">Pilih Agama</option>
											<option value="">Islam</option>
											<option value="">Kristen</option>
										</select>
										<div class="form-control-position">
			                                <i class="icon-spinner2 spinner" id="spinner-item" style="display: none;"></i>
			                            </div>
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row position-relative has-icon-left">
									<label for="name" class="col-md-2 label-control">Status</label>
									<div class="col-md-10">
										<select class="form-control items" name="po_detail_id" required>
											<option value="">Pilih Status</option>
											<option value="">Menikah</option>
											<option value="">Belum Menikah</option>
										</select>
										<div class="form-control-position">
			                                <i class="icon-spinner2 spinner" id="spinner-item" style="display: none;"></i>
			                            </div>
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row ">
									<label for="tanggal_lahir" class="col-md-2 label-control">Pekerjaan</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="tanggal_lahir" required value="{{ old('pekerjaan') }}">
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group row position-relative has-icon-left">
									<label for="name" class="col-md-2 label-control">Kewarganegaraan</label>
									<div class="col-md-10">
										<select class="form-control items" name="po_detail_id" required>
											<option value="">Pilih Kewarganegaraan</option>
											<option value="">WNI</option>
											<option value="">WNA</option>
										</select>
										<div class="form-control-position">
			                                <i class="icon-spinner2 spinner" id="spinner-item" style="display: none;"></i>
			                            </div>
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
