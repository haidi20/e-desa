@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 batas-atas">
          <div class="account-wall">
            <h2 align="center">Masuk</h2>
            {{-- <form class="form-signin" action="{{route('login')}}" method="post"> --}}
            <form class="form-signin" action="#" method="post">
              {{ csrf_field() }}
              <input type="text" name="email" class="form-control" placeholder="Alamat Email" required autofocus>
              <h5>Tidak ada akun dengan alamat email yang anda maksud</h5>
              <button class="btn btn-lg btn-primary btn-block" type="submit">
                  Oke
              </button>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
