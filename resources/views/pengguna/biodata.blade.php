@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
        	<div class="jumbotron">
        		<div align="center">
        			<h3>Biodata Pengguna</h3>
        			<hr>
        		</div>
        		<br>
        		<div class="row">
        			<div class="col-md-4">
        				<div align="center">
        					<div style="width:100px; height:100px; background-color: black; color:white"> foto </div><br>
        					<a href="#" class="btn btn-md btn-primary"> Download File CV </a>
        				</div>        				
        			</div>
        			<div class="col-md-4">
        				<div class="form-group">
							<label class="control-label" for="focusedInput">Username</label>
							<h5>ahmad dani</h5>
						</div>
						<div class="form-group">
							<label class="control-label" for="focusedInput">Tempat Lahir</label>
							<h5>Jakarta</h5>
						</div>
						<div class="form-group">
							<label class="control-label" for="focusedInput">Tanggal Lahir</label>
							<h5>26-10-1990</h5>
						</div>
						<div class="form-group">
							<label class="control-label" for="focusedInput">Nama Sekolah</label>
							<h5>SMK Maju Jaya</h5>
						</div>
						<div class="form-group">
							<label class="control-label" for="focusedInput">Tahun Kelulusan</label>
							<h5>2015</h5>
						</div>
						<div class="form-group">
							<label class="control-label" for="focusedInput">Nilai Akhir</label>
							<h5>80,5</h5>
						</div>
        			</div>
        			<div class="col-md-4">
        				<a href="#" class="btn btn-md btn-primary">Edit Data</a>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection
