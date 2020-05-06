
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
		<title>KIB Complex Reservation System, Krishibid Institution Bangladesh (KIB)</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel='stylesheet' id='wp-block-library-css'  href="{{asset('frontend/css/style.min.css')}}" type='text/css' media='all' />

<link rel='stylesheet' id='bpf-addons-css'  href="{{asset('frontend/css/style.css')}}" type='text/css' media='all' />

<link rel='stylesheet' id='bpf-addons-css'  href="{{asset('frontend/css/style.one.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='bpf-addons-css'  href="{{asset('frontend/css/style.two.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='bpf-addons-css'  href="{{asset('frontend/css/style.three.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='bpf-addons-css'  href="{{asset('frontend/css/styles.css')}}" type='text/css' media='all' />
{{-- Style.css --}}


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<link rel='stylesheet' id='bootstrap-css'  href="{{asset('frontend/css/bootstrap.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='magnific-popup-css'  href="{{asset('frontend/css/magnific-popup.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='instag-slider-css'  href="{{asset('frontend/css/instag-slider.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-css'  href="{{asset('frontend/css/elementor-icons.min.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='elementor-animations-css'  href="{{asset('frontend/css/animations.min.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='elementor-frontend-css'  href="{{asset('frontend/css/frontend.min.css')}}" type='text/css' media='all' />

<!--Not Asset -->
<link rel='stylesheet' id='elementor-pro-css'  href='https://www.g8kib.tulona.com.bd/wp-content/plugins/elementor-pro/assets/css/frontend.min.css?ver=2.1.9' type='text/css' media='all' />

<link rel='stylesheet' id='elementor-global-css'  href="{{asset('frontend/css/global.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-18-css'  href="{{asset('frontend/css/post-18.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='opal-hotel-room-booking-css'  href="{{asset('frontend/css/opalhotel.css')}}" type='text/css' media='all' />


<link rel='stylesheet' id='owl-carousel-css'  href="{{asset('frontend/css/owl.carousel.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='prettyPhoto-css-css'  href="{{asset('frontend/css/prettyPhoto.css')}}" type='text/css' media='all' />
<link rel='stylesheet' id='jBox-css'  href="{{asset('frontend/css/jBox.css')}}" type='text/css' media='all' />
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
</head>
<body class="home page-template page-template-elementor_canvas page page-id-18 wp-custom-logo sidebar-right slideout-style-sidebar elementor-default elementor-template-canvas elementor-page elementor-page-18">
	<div data-elementor-type="wp-page" data-elementor-id="18" class="elementor elementor-18" data-elementor-settings="[]">
	<div class="elementor-inner">
		<div class="elementor-section-wrap">
			<section class="elementor-element elementor-element-760655b elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section">
			<div class="elementor-container elementor-column-gap-no">
				<div class="elementor-row">
					<div class="elementor-element elementor-element-9c306c2 elementor-column elementor-col-50 elementor-top-column">
						<div class="elementor-column-wrap  elementor-element-populated">
							<div class="elementor-widget-wrap">
								<div class="elementor-element elementor-element-11c8a2b elementor-widget elementor-widget-image">
									<div class="elementor-widget-container">
									<div class="elementor-image">
											<a data-elementor-open-lightbox="" href="{{route('index')}}">
											<img src="{{ asset('frontend/image') }}/{{ $setting->logo }}" title="cropped-logo" alt="cropped-logo"/></a>
											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<section class="elementor-element elementor-element-760655b elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section">
<div class="elementor-container elementor-column-gap-no">
		<div class="elementor-row">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
    			<div class="carousel-inner" role="listbox">
    			@php
    				$count =1; 
    			@endphp
    			@foreach($slider as $sliders)
					<div class="carousel-item {{ $count == 1 ? 'active' : '' }}">
					    <img src="{{ asset('Image/Slider') }}/{{ $sliders->image }}" style="height: 400px;" class="d-block w-100" alt="...">
					</div>
					@php 
						$count ++;
					@endphp
				@endforeach
		  		</div>
				 <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</section>



<section class="elementor-element elementor-element-1e441daf elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section">
<div class="elementor-container elementor-column-gap-no">
	<div class="elementor-row">
		<div class="elementor-element elementor-element-70d444dd elementor-column elementor-col-100 elementor-top-column">
			<div class="elementor-column-wrap  elementor-element-populated">
				<div class="elementor-widget-wrap">
					<div class="elementor-element elementor-element-3f47be46 elementor-nav-menu__align-center nav-bg elementor-nav-menu--indicator-classic elementor-nav-menu--dropdown-tablet elementor-nav-menu__text-align-aside elementor-nav-menu--toggle elementor-nav-menu--burger elementor-widget elementor-widget-nav-menu" >
						<div class="elementor-widget-container">
							<nav class="navbar navbar-expand-lg navbar-light bg-success">
								  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								    <span class="navbar-toggler-icon"></span>
								  </button>

								  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
								    <ul class="navbar-nav">
								    <li class="nav-item">
								        <a class="nav-link text-light" href="{{route('index')}}">হোম &nbsp;</a>
								    </li>

								    <li class="nav-item">
								        <a class="nav-link text-light" href="{{route('about')}}">কেআইবি কমপ্লেক্সের রূপকার &nbsp;</a>
								    </li>

									<li class="nav-item dropdown">
								        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          কেআইবি কমপ্লেক্স বুকিং 
								        </a> 
								        <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdown">
								        @foreach($servicetype as $servicetypes)
								          <a class="dropdown-item text-light" style="font-size: 18px;" href="{{route('service', $servicetypes->id)}}">{{$servicetypes->name}}</a>
								        @endforeach
								        </div>
								    </li>

								    <li class="nav-item">
								        <a class="nav-link text-light" href="{{route('contact')}}">যোগাযোগ  &nbsp;</a>
								    </li>
								    @guest
										<li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-light">সাইন ইন &nbsp;</a>
										</li>
										@if (Route::has('register'))
					                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('register') }}">সাইন আপ &nbsp;</a>
					                    </li>
				                  	@endif
				                 	@else
				                 		<li class="nav-item"><a href="{{route('dashboard')}}" class="nav-link text-light text-capitalize">{{Auth::user()->name}}</a>
										</li>
					                    <li class="nav-item ">
					                        <a class="nav-link text-light" href="{{ route('logout') }}"
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
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</section>

@yield('content')

<section class="elementor-element elementor-element-4d21b603 elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle elementor-section elementor-top-section">
	<div class="elementor-container elementor-column-gap-default">
		<div class="elementor-row">
			<div class="elementor-element elementor-element-144eecac elementor-column elementor-col-100 elementor-top-column" data-id="144eecac" data-element_type="column">
				<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
						<div class="elementor-element elementor-element-55522cf9 elementor-widget elementor-widget-image" data-id="55522cf9" data-element_type="widget" data-widget_type="image.default">
							<div class="elementor-widget-container">
								<div class="elementor-image">
									<img width="1020" height="84" src="{{asset('frontend/image/footer.png')}}" sizes="(max-width: 1020px) 100vw, 1020px" />
								</div>
							</div>
						</div>
				<div class="elementor-element elementor-element-583f712 elementor-widget elementor-widget-text-editor">
					<div class="elementor-widget-container">
						<div class="elementor-text-editor elementor-clearfix"><h4 style="text-align: center;">{{$setting->copyright}}<a href="https://g8ict.com" class="text-primary" target="_blank">G8ICT Limited</a></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>

<script>
    @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
    @elseif(Session::has('info'))
      toastr.info("{{ Session::get('info') }}")
    @elseif(Session::has('warning'))
      toastr.warning("{{ Session::get('warning') }}")
    @elseif(Session::has('error'))
      toastr.error("{{ Session::get('error') }}")
    @endif
  </script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
 {{-- <script src="{{asset('frontend/Bootstrap/js/bootstrap.js')}}"></script> --}}
  {{-- <script src="{{asset('frontend/Bootstrap/js/bootstrap.min.js')}}"></script> --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

