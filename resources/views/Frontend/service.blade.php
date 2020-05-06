@extends('layouts.frontend')
@section('content')

<section class="elementor-element elementor-element-f75e305 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section">
	@foreach($service as $services)
<div class="elementor-container elementor-column-gap-default">
	
	<div class="elementor-row">
		
		<div class="elementor-element elementor-element-ad386d4 elementor-column elementor-col-100 elementor-top-column" data-id="ad386d4" data-element_type="column">
		<div class="elementor-column-wrap  elementor-element-populated">
			<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-4eb140e elementor-widget elementor-widget-heading" data-id="4eb140e" data-element_type="widget" data-widget_type="heading.default">
				</div>	
				<div class="elementor-element elementor-element-7190bcd elementor-widget elementor-widget-text-editor" data-id="7190bcd" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-image my-3">
						<img style="height: 300px; width: 500px;" src="{{asset('Image/Service')}}/{{$services->image}}"  />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="elementor-element elementor-element-a935343 elementor-column elementor-col-50 elementor-top-column" data-id="a935343" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-e6f6661 elementor-widget elementor-widget-heading" data-id="e6f6661" data-element_type="widget" data-widget_type="heading.default">
				</div>
				<div class="elementor-element elementor-element-60cddc6 elementor-widget elementor-widget-text-editor" data-id="60cddc6" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<h2 class="my-3"><b>{{$services->name}}</b></h2>
					<h3 class="elementor-text-editor elementor-clearfix my-3"><ul>
						{!! $services->description !!}<span style="color: #ff0000;">ধারণক্ষমতা আকার:</span> {{$services->capacity}} জন<br /><span style="color: #ff0000;">স্থান ভাড়া:</span> (একদিন) {{$services->price}}) + <span style="color: #ff0000;">১৫% ভ্যাট</span></li></ul></h3>
					<button class="btn btn-dark btn-block btn-lg"><a href="{{route('service-booking', $services->id)}}" class="text-light">Book Now</a></button>
				</div>
				</div>
						</div>
			</div>
		</div>
	</div>
</div>
	@endforeach
</section>


@endsection
