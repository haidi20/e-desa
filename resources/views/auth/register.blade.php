@extends('_layouts.default')

@section('script-top')
<style type="text/css">
.forget-password{
  margin-right: 10px;
  cursor:pointer;
}
</style>
@endsection

@section('konten')
  <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 batas-atas">
          <div class="account-wall">
            <h2 align="center">Registerasi</h2>
            {{-- <form class="form-signin" action="{{route('login')}}" method="post"> --}}
            <form class="form-signin" action="#" method="post">
              {{ csrf_field() }}
              <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
              <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
              <input type="password" name="repassword" class="form-control" placeholder="Ulang Kata Sandi" required>
              <button class="btn btn-lg btn-primary btn-block" type="submit">
                  Daftar
              </button>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
