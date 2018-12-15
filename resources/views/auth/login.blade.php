@extends('_layouts.basic')

{{-- @section('script-top')
{!! Html::style('robust/app-assets/vendors/css/forms/icheck/icheck.css') !!}
{!! Html::style('robust/app-assets/vendors/css/forms/icheck/custom.css') !!}
{!! Html::style('robust/app-assets/css/pages/login-register.min.css') !!}
{!! Html::style('robust/app-assets/css/plugins/forms/validation/form-validation.min.css') !!}
@endsection

@section('script-bottom')
{!! Html::script('robust/app-assets/vendors/js/forms/icheck/icheck.min.js') !!}
{!! Html::script('robust/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') !!}
{!! Html::script('robust/app-assets/js/scripts/forms/form-login-register.min.js') !!}
{!! Html::script('robust/app-assets/js/scripts/forms/validation/form-validation.min.js') !!}
@endsection --}}

@section('basic-content')
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column bg-lighten-2 fixed-navbar">

  <div class="app-content content container-fluid">
    <div class="content-wrapper"><div class="content-header row"></div>
    <div class="content-body">
      <section class="col-md-4 offset-md-4 col-xs-8 offset-xs-2 box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 px-2 py-2 row mb-0">
          <div class="card-header no-border">
            <div class="card-title text-xs-center">
              <div class="p-1">
                {{-- <h1 class="text-bold-800">BOS</h1> --}}
                <h5>Sistem Informasi Desa</h5>

                {{-- <img src="{{ asset('img/png/logo-kemenperin.png') }}" alt="company logo" width="300"> --}}
              </div>
            </div>
            <!-- <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-1">
              <span>BALAI RISET & STANDARDISASI INDUSTRI SAMARINDA</span>
            </h6> -->
          </div>
          <div class="card-body collapse in">
            <div class="card-block">
              {{-- {!! Form::open(['class' => 'form-horizontal', 'novalidate']) !!} --}}
               <form action="{{ route('login') }}" method="post">
               {{ csrf_field() }}
              <input type="hidden" name="open_from" value="web apps">
              @if (count($errors) > 0)
                      <div class="alert alert-danger alert-icon-left alert-dismissible fade in mb-2" role="alert">
                <strong>Maaf!</strong><br>
                @foreach ($errors->all() as $error)
                              {{ $error }}<br>
                          @endforeach
              </div>
                      @endif
              <fieldset class="form-group position-relative has-icon-left">
                <input type="username" class="form-control input-lg" id="user-name" placeholder="Your Username" tabindex="1" required data-validation-required-message= "Please enter your username." name="username" autofocus>
                <div class="form-control-position"><i class="icon-user"></i></div>
                <div class="help-block font-small-3"></div>
              </fieldset>
              <fieldset class="form-group position-relative has-icon-left">
                <input type="password" class="form-control input-lg" id="password" placeholder="Enter Password" tabindex="2" required data-validation-required-message= "Please enter valid passwords." name="password">
                <div class="form-control-position"><i class="icon-key3"></i></div>
                <div class="help-block font-small-3"></div>
              </fieldset>
              <fieldset class="form-group row">
                <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                  {{-- <fieldset>
                    <input type="checkbox" id="remember-me" class="chk-remember" name="remember">
                    <label for="remember-me"> Remember Me</label>
                  </fieldset> --}}
                </div>
              </fieldset>
              <button type="submit" class="btn btn-green btn-block btn-lg"><i class="icon-unlock2"></i> Login</button>
            </form>
              {{-- {!! Form::close() !!} --}}
            </div>
          </div>
        </div>
      </section>
    </div>
    </div>
  </div>
</body>
@endsection