@extends('_layouts.default')

@section('content')
<div class="content-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="card-block">
						<div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
                            <div class="float-xs-left pl-2">
                                <span class="grey darken-1 block">Penduduk</span>
                                <span class="font-large-3 line-height-1 text-bold-300">25</span>
                            </div>
                            <div class="float-xs-left mt-2">
                                <span class="grey darken-1 block"></span>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
                            <div class="float-xs-left pl-2">
                                <span class="grey darken-1 block">Kematian</span>
                                <span class="font-large-3 line-height-1 text-bold-300">185</span>
                            </div>
                            <div class="float-xs-left mt-2">
                                <span class="grey darken-1 block"></span>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 border-right-grey border-right-lighten-3 clearfix">
                            <div class="float-xs-left pl-2">
                                <span class="grey darken-1 block">Kelahiran</span>
                                <span class="font-large-3 line-height-1 text-bold-300">64</span>
                            </div>
                            <div class="float-xs-left mt-2">
                                <span class="grey darken-1 block"></span>
                                {{-- <span class="block"><i class="icon-arrow-down4 deep-orange accent-3"></i></span> --}}
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 clearfix">
                            <div class="float-xs-left pl-2">
                                <span class="grey darken-1 block">Surat</span>
                                <span class="font-large-3 line-height-1 text-bold-300">22.3</span>
                            </div>
                            <div class="float-xs-left mt-2">
                                <span class="grey darken-1 block"></span>
                                {{-- <span class="block"><i class="icon-arrow-up4 success"></i></span> --}}
                            </div>
                        </div>
                    </div>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection
