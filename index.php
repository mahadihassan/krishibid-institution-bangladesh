<ul id="menu-1-3f47be46" class="elementor-nav-menu">
          <li class="menu-item"><a href="{{route('index')}}" aria-current="page" class="elementor-item">হোম</a>
          </li>
          <li class="menu-item"><a href="{{route('about')}}" class="elementor-item">কেআইবি কমপ্লেক্সের রূপকার</a>
          </li>
          
          <div class="dropdown">
            <li class="dropbtn"><a href="" class="elementor-item">কেআইবি কমপ্লেক্স বুকিং</a>
            <ul class="dropdown-content sub-menu elementor-nav-menu--dropdown">
              @foreach($servicetype as $servicetypes)
                <li><a href="{{route('service', $servicetypes->id)}}">{{$servicetypes->name}}</a></li>
              @endforeach
            </ul>
          </li>
          </div>
          <li class="menu-item"><a href="{{route('contact')}}" class="elementor-item">যোগাযোগ</a>
          </li>
          @guest
            <li class="menu-item"><a href="{{ route('login') }}" class="elementor-item">সাইন ইন</a>
            </li>
            @if (Route::has('register'))
                      <li class="nav-item"><a class="elementor-item" href="{{ route('register') }}">সাইন আপ</a>
                      </li>
                    @endif
                  @else
                    <li class="nav-item"><a href="{{route('dashboard')}}" class="elementor-item text-capitalize">{{Auth::user()->name}}</a>
            </li>
                      <li class="nav-item ">
                          <a class="elementor-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              সাইন আউট
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                          </form>
                        </div>
                      </li>
                      
                  @endguest
        </ul>













