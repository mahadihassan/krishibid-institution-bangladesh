
  <header class="main-header">
    <p class="logo">
      <span class="logo-mini"><b>KIB</span>
      <span class="logo-lg"><b>KIB</b> Complex</span>
    </p>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs text-capitalize">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <p class="text-capitalize">
                   {{ Auth::user()->name}}
                  <small>{{Auth::user()->email}}</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('index')}}" class="btn btn-default btn-flat">Public View</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}"  class="btn btn-default btn-flat"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>