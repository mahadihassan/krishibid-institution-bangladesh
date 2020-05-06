@extends('layouts.frontend')
@section('content')

<section class="elementor-element elementor-element-f75e305 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section">
<div class="elementor-container elementor-column-gap-default">
	<div class="elementor-row">
				<div class="elementor-element elementor-element-ad386d4 elementor-column elementor-col-100 elementor-top-column" data-id="ad386d4" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
				<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-4eb140e elementor-widget elementor-widget-heading" data-id="4eb140e" data-element_type="widget" data-widget_type="heading.default">
					<div class="elementor-widget-container py-3">
						<h1 class="elementor-heading-title elementor-size-default">আমাদের সম্পর্কে</h1>
					</div>
				</div>
				<div class="elementor-element elementor-element-7190bcd elementor-widget elementor-widget-text-editor" data-id="7190bcd" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="text-justify">কৃষিবিদ ইনস্টিটিউশন বাংলাদেশ (কেআইবি) একটি অন্যতম বৃহৎ পেশাজীবী প্রতিষ্ঠান। এই প্রতিষ্ঠানের ঢাকা মেট্রোপলিটন শাখা, বাংলাদেশ কৃষি বিশ্ববিদ্যালয়সহ ৬৬টি জেলা শাখা রয়েছে। বাংলাদেশের যে কোন বিশ্ববিদ্যালয় শাখা গঠন করতে পারবে। তবে সে বিশ্ববিদ্যালয়ে কেআইবি’র সদস্য সংখ্যা ন্যূনতম ৫১ জন হতে হবে। বাংলাদেশ বিশ্ববিদ্যালয় মঞ্জুরী কমিশন কর্তৃক অনুমোদিত বাংলাদেশের যে কোন বিশ্ববিদ্যালয়/প্রতিষ্ঠান থেকে কৃষি বিজ্ঞানের বিভিন্ন শাখা হতে ন্যূনতম স্নাতক বা সমমানের ডিগ্রীপ্রাপ্ত এবং বিদেশের বিশ্ববিদ্যালয় বা প্রতিষ্ঠান থেকে কৃষি বিষয়ে স্নাতক অথবা স্নাতকোত্তর (কারিকুল্যাম বিবেচনা করে সিইসি সিদ্ধান্ত গ্রহণ করবে) ডিগ্রীপ্রাপ্ত ব্যক্তিবর্গ কৃষিবিদ ইনস্টিটিউশন বাংলাদেশ-এর সদস্য হিসাবে অন্তর্ভূক্ত হতে পারবেন।
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</section>


<section class="elementor-element elementor-element-f75e305 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section">
<div class="elementor-container elementor-column-gap-default">
	<div class="elementor-row">
		<div class="elementor-element elementor-element-ad386d4 elementor-column elementor-col-100 elementor-top-column" data-id="ad386d4" data-element_type="column">
		<div class="elementor-column-wrap  elementor-element-populated">
			<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-4eb140e elementor-widget elementor-widget-heading" data-id="4eb140e" data-element_type="widget" data-widget_type="heading.default">
				</div>	
					<div class="elementor-element elementor-element-7190bcd elementor-widget elementor-widget-text-editor" data-id="7190bcd" data-element_type="widget" data-widget_type="text-editor.default">
						<h2 class="text-center"><b>আমাদের সার্ভিস সমূহ</b></h2>
						<br>
						<div class="elementor-widget-container">
					        @foreach($homeService as $homeServices)
					          <div class="col-md-3">
					            <a href="{{route('service', $homeServices->id)}}" class="unit-1 text-center">
					            @if($homeServices->image != null)
					              	<img  class="responsive" src="{{ asset('Image/ServiceType') }}/{{ $homeServices->image }}" style="height: 150px; width: 200px;">
					            @else
					            @endif
					                <h3 class="text-dark py-3">{{$homeServices->name}}</h3>
					            </a>
					          </div>
					        @endforeach
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@endsection