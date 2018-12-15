<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up float-xs-left">
          <a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/') }}" class="navbar-brand nav-link text-sm-center text-white" style="font-size: 13px;">
            {{-- <img alt="branding logo" src="{{ asset('img/png/logo-icon-medium.png') }}" data-expand="{{ asset('img/png/logo-icon-medium.png') }}" data-collapse="{{ asset('img/png/logo-icon-small.png') }}" class="brand-logo"> --}}
          </a>
        </li>
        <li class="nav-item hidden-md-up float-xs-right">
          <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container">
            <i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i>
          </a>
        </li>
      </ul>
    </div>
    <div class="navbar-container content container-fluid">
      <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
        <ul class="nav navbar-nav">
          <li class="nav-item hidden-sm-down">
            <a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a>
          </li>
          <li class="nav-item">
            <!-- <div class="card-block">
              <div class="tag tag-primary text-white">
                <span>Super Admin</span>
              </div>
            </div> -->
            <a class="nav-link">
              <strong></strong>
            </a>
          </li>
        </ul>
        <ul class="nav navbar-nav float-xs-right">
          <li class="dropdown dropdown-notification nav-item">
            <a onclick="$('#infobar-modal').modal('show')" data-toggle="dropdown" class="nav-link nav-link-label">
              {{-- <i class="ficon icon-info"></i> --}}
            </a>
          </li>
          <li class="dropdown dropdown-user nav-item">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
              <span class="avatar avatar-online">
                {{-- <img src="{{ asset('robust/app-assets/images/portrait/small/avatar-s-1.png') }}" alt="avatar"><i></i> --}}
                {{-- {!! Auth::user()->preview_img_circle !!} --}}
              </span>
              <span class="user-name"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              {{-- <a href="javascript;" class="dropdown-item" data-toggle="modal" data-target="#group_session">
                <i class="icon-switch"></i> Switch Group
              </a> --}}
              <a href="{{route('user.index')}}" class="dropdown-item"><i class="icon-profile"></i> Pengaturan Pengguna</a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" 
                  onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-sign-out"></i>
                  Keluar
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form></a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
