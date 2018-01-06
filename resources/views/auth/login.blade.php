@extends('_layouts.basic')

@section('tubuh')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2 align="center">Standar Pelayanan Minimal</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
            <form role="form">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    </div>
                    {{-- <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                        </label>
                    </div> --}}
                    <a href="javascript:;" class="btn btn-sm btn-success col-md-offset-10">Kirim</a>
                </fieldset>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
