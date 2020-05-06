 <aside class="main-sidebar">
    <section class="sidebar">
      
      
      <ul class="sidebar-menu" data-widget="tree">

        <li class="{{Route::currentRouteName() == ('admin.index') ? 'active' : '' }}">
            <a href="{{route('admin.index')}}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
            </a>
          </li>

      @can('servicebooking.viewAny', Auth::user())
        <li class="{{ Route::currentRouteName() == ('admin.Booking.index') || Route::currentRouteName() == ('admin.Booking.edit') || Route::currentRouteName() == ('admin.Booking.show') || Route::currentRouteName() == ('admin.Payment') || Route::currentRouteName() == ('admin.PaymentLog') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-table"></i>
              <span>Service Booking</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            @can('servicebooking.view', Auth::user())
              <li class="{{  Route::currentRouteName() == ('admin.Booking.index') ? 'active' : '' }}"><a href="{{route('admin.Booking.index')}}"><i class="fa fa-equals"></i>List</a></li>
            @endcan
            </ul>
          </li>
        @endcan

          <li class="{{ Request::is('admin/Payment') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-bar-chart"></i>
              <span>Payment</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is('admin/Payment') ? 'active' : '' }}"><a href="{{route('admin.Payment.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
            </ul>
          </li>
        @can('slider.viewAny', Auth::user())
        <li class="{{ Route::currentRouteName() == ('admin.Slider.create') || Route::currentRouteName() == ('admin.Slider.index') || Route::currentRouteName() == ('admin.Slider.edit') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-picture-o"></i>
              <span>Sliders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @can('slider.create', Auth::user())
              <li class="{{  Route::currentRouteName() == ('admin.Slider.create') ? 'active' : '' }}"><a href="{{route('admin.Slider.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
              @endcan
              @can('slider.view', Auth::user())
              <li class="{{  Route::currentRouteName() == ('admin.Slider.index') ||  Route::currentRouteName() == ('admin.Slider.edit') ? 'active' : '' }}"><a href="{{route('admin.Slider.index')}}"><i class="fa fa-circle-o"></i>list</a></li>
              @endcan
            </ul>
          </li>
        @endcan
        @can('users.viewAny', Auth::user())
         <li class="{{ Route::currentRouteName() == ('admin.User.index') || Route::currentRouteName() == ('admin.User.edit') || Route::currentRouteName() == ('admin.User.create') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            @can('users.create', Auth::user())
              <li class="{{  Route::currentRouteName() == ('admin.User.create') ? 'active' : '' }} "><a href="{{route('admin.User.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
            @endcan
            @can('users.view', Auth::user())
              <li class="{{  Route::currentRouteName() == ('admin.User.index') ? 'active' : '' }}"><a href="{{route('admin.User.index')}}"><i class="fa fa-circle-o"></i>list</a></li>
            @endcan
            </ul>
          </li>
          @endcan


        @can('servicetype.viewAny', Auth::user())
          <li class="{{ Route::currentRouteName() == ('admin.ServiceType.create') || Route::currentRouteName() == ('admin.ServiceType.index') || Route::currentRouteName() == ('admin.ServiceType.edit') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>ServiceType</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            @can('servicetype.create', Auth::user())
              <li class="{{ Route::currentRouteName() == ('admin.ServiceType.create') ? 'active' : '' }} "><a href="{{route('admin.ServiceType.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
            @endcan
            @can('servicetype.view', Auth::user())
              <li class="{{ Route::currentRouteName() == ('admin.ServiceType.index') || Route::currentRouteName() == ('admin.ServiceType.edit') ? 'active' : '' }}"><a href="{{route('admin.ServiceType.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
            @endcan
            </ul>
          </li>
        @endcan
      @can('service.viewAny', Auth::user())
        <li class="{{ Route::currentRouteName() == ('admin.Service.create') || Route::currentRouteName() == ('admin.Service.index') || Route::currentRouteName() == ('admin.Service.edit') || Route::currentRouteName() == ('admin.Service.show') ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Service</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          @can('service.create', Auth::user())
            <li class="{{ Route::currentRouteName() == ('admin.Service.create') ? 'active' : '' }}"><a href="{{route('admin.Service.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
          @endcan
          @can('service.view', Auth::user())
            <li class="{{ Route::currentRouteName() == ('admin.Service.index') || Route::currentRouteName() == ('admin.Service.edit') ? 'active' : '' }}"><a href="{{route('admin.Service.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
          @endcan
          </ul>
        </li>
        @endcan
      @can('serviceconfigure.viewAny', Auth::user())
        <li class="{{ Route::currentRouteName() == ('admin.ServiceConfigure.create') || Route::currentRouteName() == ('admin.ServiceConfigure.index') || Route::currentRouteName() == ('admin.ServiceConfigure.edit') || Route::currentRouteName() == ('admin.ServiceConfigure.show') ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Service Configure</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          @can('serviceconfigure.create', Auth::user())
            <li class="{{ Route::currentRouteName() == ('admin.ServiceConfigure.create') ? 'active' : '' }}"><a href="{{route('admin.ServiceConfigure.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
          @endcan
          @can('serviceconfigure.view', Auth::user())
            <li class="{{ Route::currentRouteName() == ('admin.ServiceConfigure.index') || Route::currentRouteName() == ('admin.ServiceConfigure.edit') ? 'active' : '' }}"><a href="{{route('admin.ServiceConfigure.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
          @endcan
          </ul>
        </li>
        @endcan

        
      @can('event.viewAny', Auth::user())
        <li class="{{ Route::currentRouteName() == ('admin.Event.create') || Route::currentRouteName() == ('admin.Event.index') || Route::currentRouteName() == ('admin.Event.edit') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-industry"></i>
              <span>Events</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            @can('event.create', Auth::user())
              <li class="{{ Route::currentRouteName() == ('admin.Event.create') ? 'active' : '' }} "><a href="{{route('admin.Event.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
            @endcan
            @can('event.view', Auth::user())
              <li class="{{ Route::currentRouteName() == ('admin.Event.index') || Route::currentRouteName() == ('admin.Event.edit') ? 'active' : '' }}"><a href="{{route('admin.Event.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
            @endcan
            </ul>
        </li>
      @endcan
        
         <li class="{{ Route::currentRouteName() == ('admin.Pages.create') || Route::currentRouteName() == ('admin.Pages.index') || Route::currentRouteName() == ('admin.Pages.edit') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Pages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Route::currentRouteName() == ('admin.Pages.create') ? 'active' : '' }} "><a href="{{route('admin.Pages.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
              <li class="{{ Route::currentRouteName() == ('admin.Pages.index') ? 'active' : '' }}"><a href="{{route('admin.Pages.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
            </ul>
        </li>

     
        <li class="{{ Route::currentRouteName() == ('admin.setting') || Route::currentRouteName() == ('admin.Contact') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Configure</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Route::currentRouteName() == ('admin.setting') ? 'active' : '' }}"><a href="{{route('admin.setting')}}"><i class="fa fa-equals"></i>Settings</a></li>
              <li class="{{ Route::currentRouteName() == ('admin.Contact')  ? 'active' : '' }}"><a href="{{route('admin.Contact')}}"><i class="fa fa-equals"></i>Contact Message</a></li>
            </ul>
          </li>
      @can('role.viewAny', Auth::user())
        <li class="{{ Route::currentRouteName() == ('admin.Role.create') || Route::currentRouteName() == ('admin.Role.index') || Route::currentRouteName() == ('admin.Role.edit') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Role Manage</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            @can('role.create', Auth::user())
              <li class="{{ Route::currentRouteName() == ('admin.Role.create') ? 'active' : '' }} "><a href="{{route('admin.Role.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
            @endcan
             @can('role.view', Auth::user())
              <li class="{{ Route::currentRouteName() == ('admin.Role.index') ? 'active' : '' }}"><a href="{{route('admin.Role.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
            @endcan
            </ul>
        </li>
      @endcan

      @can('permission.viewAny', Auth::user())
        <li class="{{ Route::currentRouteName() == ('admin.Permission.create') || Route::currentRouteName() == ('admin.Permission.index') || Route::currentRouteName() == ('admin.Permission.edit') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Permission</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            @can('permission.create', Auth::user())
              <li class="{{ Route::currentRouteName() == ('admin.Permission.create') ? 'active' : '' }} "><a href="{{route('admin.Permission.create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
            @endcan
            @can('permission.view', Auth::user())
              <li class="{{ Route::currentRouteName() == ('admin.Permission.index') ? 'active' : '' }}"><a href="{{route('admin.Permission.index')}}"><i class="fa fa-circle-o"></i>List</a></li>
            @endcan
            </ul>
        </li>
        @endcan

        <li class="{{ Route::currentRouteName() == ('admin.Report') ? 'active' : '' }} treeview">
            <a href="#">
              <i class="fa fa-table"></i>
              <span>Report</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Route::currentRouteName() == ('admin.Report') ? 'active' : '' }}"><a href="{{route('admin.Report')}}"><i class="fa fa-equals"></i>Booking List</a></li>
            </ul>
          </li>
      </ul>
    </section>
  </aside>
