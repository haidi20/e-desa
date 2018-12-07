@extends('_layouts.basic')

@section('basic-content')
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns fixed-navbar">
	@include('_layouts.header')
    @include('_layouts.sidebar')

    <div class="app-content content container-fluid">
    	<div class="content-wrapper">

    		@yield('content')

    	</div>
    </div>

    {{-- @include('_layout.footer') --}}
    <script>
      var Laravel = {
        csrfToken: '{{ csrf_token() }}'
      }
    </script>
</body>
@endsection
