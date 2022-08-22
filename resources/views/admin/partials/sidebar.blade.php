<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      {{-- <div class="navbar nav_title" style="border: 0;">
        <a href="/" class="site_title"> <img src="{{ URL::asset('images/logo-unair.png')}}" alt="..." class="img-circle" width="23%"></i> <span>Dashboard</span></a>
      </div> --}}

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{ URL::asset('images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>{{ auth()->user()->name }}</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a href="/dashboardmatkul"><i class="fa fa-home"></i> Manajemen Mata Kuliah </a></li>
            <li><a href="{{ route('jadwal.index') }}"><i class="fa fa-edit"></i> Manajemen Ruangan </a></li>
            <li><a href="{{ route('asset.index') }}"><i class="fa fa-desktop"></i> Manajemen Aset</a></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="text-white btn btn-link" style="text-decoration:none;font-size:13px;">
                  <i class="fa fa-sign-out"></i>Logout
                </button>
              </form>
            </li>

             
          </ul>
        </div>
            
      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>