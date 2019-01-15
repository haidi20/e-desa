@extends('_layouts.default')

@section('content')
<div class="content-body">
	<div class="row">
		<div class="col-md-12">
            <div class="card-header">
                <h3 class="card-title">Dashboard</h3>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        {{-- <li><a data-action="collapse"><i class="icon-minus4"></i></a></li> --}}
                        {{-- <li><a data-action="expand"><i class="icon-expand2"></i></a></li> --}}
                    </ul>
                </div>
            </div>
			<div class="card">
				<div class="card-body">
					<div class="card-block">
                        <!-- start row -->
					    <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="card-block cleartfix">
                                            <div class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-ios-people cyan font-large-3 mr-2"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h4>Total Penduduk</h4>
                                                    {{-- <span>Monthly blog posts</span> --}}
                                                </div>
                                                <div class="media-right media-middle">
                                                    <h1>{{$total_penduduk}}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block cleartfix">
                                            <div class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-head teal font-large-2 mr-2"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h4>Total Kepala Keluarga</h4>
                                                    {{-- <span>Monthly blog comments</span> --}}
                                                </div>
                                                <div class="media-right media-middle">
                                                    <h1>{{$kepalakeluarga}}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- start row -->
                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="card-block cleartfix">
                                            <div class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-flag4 cyan font-large-2 mr-2"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h4>Total Warga Kematian</h4>
                                                    {{-- <span>Monthly blog posts</span> --}}
                                                </div>
                                                <div class="media-right media-middle">
                                                    <h1>{{$kematian}}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block cleartfix">
                                            <div class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-android-add teal font-large-2 mr-2"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h4>Total Warga Kelahiran</h4>
                                                    {{-- <span>Monthly blog comments</span> --}}
                                                </div>
                                                <div class="media-right media-middle">
                                                    <h1>{{$kelahiran}}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- start row -->
                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="card-block cleartfix">
                                            <div class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-map cyan font-large-2 mr-2"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h4>Total Dusun</h4>
                                                    {{-- <span>Monthly blog posts</span> --}}
                                                </div>
                                                <div class="media-right media-middle">
                                                    <h1>{{$dusun}}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block cleartfix">
                                            <div class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-android-drafts teal font-large-2 mr-2"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h4>Total Surat Keluar</h4>
                                                    {{-- <span>Monthly blog comments</span> --}}
                                                </div>
                                                <div class="media-right media-middle">
                                                    <h1>{{$surat}}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- start row -->
                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="card-block cleartfix">
                                            <div class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-enlarge2 cyan font-large-2 mr-2"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h4>Total Penduduk Pindah</h4>
                                                    {{-- <span>Monthly blog posts</span> --}}
                                                </div>
                                                <div class="media-right media-middle">
                                                    <h1>{{$pindah}}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block cleartfix">
                                            <div class="media">
                                                <div class="media-left media-middle">
                                                    <i class="icon-shrink2 cyan font-large-2 mr-2"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h4>Total Penduduk Datang</h4>
                                                    {{-- <span>Monthly blog comments</span> --}}
                                                </div>
                                                <div class="media-right media-middle">
                                                    <h1>{{$datang}}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection
