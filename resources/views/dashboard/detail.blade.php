@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
        <div class="col-md-8">
        	<div class="jumbotron">
        		<div class="row">
        			<div class="col-md-10">
        				<h3>Nama Perusahaan</h3>
			    		<h6>Nama Bidang | Kota Lowongan | Tanggal</h6> <br>
        			</div>
        			<div class="col-md-2">
        				<a href="{{url('dashboard')}}" class="btn btn-md btn-info button-top">Kembali</a>
        			</div>
        		</div>
        		<hr>
        		<br>
        		<div class="row">
        			<div class="col-md-12">
        				<h4>Tugas dan Tanggung Jawab :</h4>
        				<ul>
        					<li>Penjelasan Tugas 1</li>
        					<li>Penjelasan Tugas 2</li>
        					<li>Penjelasan Tugas 3</li>
        				</ul>
        				<h4>Kualifikasi :</h4>
        				<ul>
        					<li>Kualifikasi 1</li>
        					<li>Kualifikasi 2</li>
        					<li>Kualifikasi 3</li>
        				</ul>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="col-md-4">
        	<div class="jumbotron">
        		<div align="center">
        			<div style="width:100px; height:100px; background-color: black" >
        			
        			</div>
        		</div>
        		<h5 align="center">
        			Profil perusahaan adalah deskripsi ringkas suatu perusahaan yang mencerminkan kualitas serta fokus kerja dari satu perusahaan. Biasanya, profil perusahaan (company profile) dibutuhkan saat kamu akan mengajukan penawaran atau investasi kepada calon pembeli, investor maupun kerjasama dengan mitra strategis bisnis.
        		</h5 >
        	</div>
        </div>
    </div>
</div>
@endsection
