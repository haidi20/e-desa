@extends('_layouts.default')

@section('script-top')
	<style>
		a:link, a:visited {
			color:#0d2244;
			text-decoration: none;
		}
	</style>
@endsection

@section('konten')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
        	<div class="jumbotron">
        		<div align="center">
        			<h3>Lengkapi Data Diri Anda</h3>
        			<hr>
        		</div>
        		<br>
        		<form action="{{url('dashboard')}}" method="get">
	        		<div class="row">
	        			<div class="col-md-6">
	        				<div class="form-group">
							  <label class="control-label" for="focusedInput">Masukkan Foto</label>
							  <input type="file">
							</div>
							<div class="form-group">
							  <label class="control-label" for="focusedInput">Masukkan CV</label>
							  <input type="file">
							</div>
							<div class="form-group">
							  <label class="control-label" for="focusedInput">Tempat Lahir</label>
							  <input type="text" class="form-control">
							</div>
							<div class="form-group">
							  <label class="control-label" for="focusedInput">Tanggal Lahir</label>
							  <input type="text" id="datepicker" class="form-control">
							</div>
	        			</div>
	        			<div class="col-md-6">
	        				<div class="form-group">
							  <label class="control-label" for="focusedInput">Nama Sekolah</label>
							  <input type="input" class="form-control">
							</div>
							<div class="form-group">
							  <label class="control-label" for="focusedInput">Tahun Kelulusan</label>
							  <input type="input" class="form-control">
							</div>
							<div class="form-group">
							  <label class="control-label" for="focusedInput">Nilai AKhir</label>
							  <input type="input" class="form-control">
							</div>
	        			</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-offset-3 col-md-6">
	        				<button class="btn btn-lg btn-block btn-success">Kirim</button>
	        			</div>
	        		</div>
	        	</form>
        	</div>
        </div>
    </div>
</div>
@endsection
