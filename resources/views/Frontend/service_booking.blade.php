@extends('layouts.frontend')
@section('content')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css">

<section class="elementor-element elementor-element-f75e305 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section">
<div class="elementor-container elementor-column-gap-default">
	
	<div class="elementor-row">
		
		<div class="elementor-element elementor-element-ad386d4 elementor-column elementor-col-100 elementor-top-column" data-id="ad386d4" data-element_type="column">
		<div class="elementor-column-wrap  elementor-element-populated">
			<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-4eb140e elementor-widget elementor-widget-heading" data-id="4eb140e" data-element_type="widget" data-widget_type="heading.default">
				</div>	
				<div class="elementor-element elementor-element-7190bcd elementor-widget elementor-widget-text-editor" data-id="7190bcd" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">

						@if(Session::has('message'))
						    <div class="alert alert-success">
						        {{ Session::get('message') }}
						    </div>
						@elseif(Session::has('messages'))
							<div class="alert alert-warning">
						        {{ Session::get('messages') }}
						    </div>
						@endif

						@if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
					<div class="elementor-image py-3">
						<img width="480" height="399" src="{{asset('Image/Service')}}/{{$services->image}}" sizes="(max-width: 600px) 100vw, 600px" />
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
					<h2 class="py-3"><b>{{$services->name}}</b></h3>
					<h3 class="elementor-text-editor elementor-clearfix"><ul>{!! $services->description !!}<br /><span style="color: #ff0000;">ধারণক্ষমতা আকার:</span> {{$services->capacity}} জন<br /><span style="color: #ff0000;">স্থান ভাড়া:</span> (একদিন) {{$services->price}}) + <span style="color: #ff0000;">১৫% ভ্যাট</span></li></ul></h3>
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
				<div class="elementor-widget-container">
					<div class="elementor-image">
						
			<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-4eb140e elementor-widget elementor-widget-heading" data-id="4eb140e" data-element_type="widget" data-widget_type="heading.default">
					<div class="elementor-widget-container">
					
						<h2 class="elementor-heading-title elementor-size-default py-2">Service Booking Form</h2>
						
					</div>
				</div>
				
					<div class="elementor-element elementor-element-7190bcd elementor-widget elementor-widget-text-editor" data-id="7190bcd" data-element_type="widget" data-widget_type="text-editor.default">
					<div class="elementor-widget-container">
						<div class="elementor-text-editor elementor-clearfix">
							<style type="text/css">
								.form-control{
									font-size: 15px;
								}
							</style>
						<form role="form" method="post" action="{{route('service-booking.store')}}" class="form" enctype="multipart/form-data">
	                       @csrf
	                        @method('POST')
	                        <div class="box-body">
	                        	<input type="hidden" value="{{Auth::user()->id}}"  name="user_id">
	                        	<input type="hidden" value="{{$services->id}}"  name="services_id">
	                        	
	                        	<input type="hidden" value="{{$services->service_types_id}}"  name="service_types_id">
	                        	<input type="hidden" value="{{$services->price}}"  name="services_price">
	                        	<input type="hidden" value="{{$setting->admin_email}}"  name="admin_email">

	                        	<div class="form-group">
	                        		<label>From Date *</label>
									<input type="text" readonly class="datepicker form-control" name="fdate" value="{{ old('fdate') }}" data-date-format="yyyy-mm-dd">
								</div>

								<div class="form-group">
	                        		<label>To Date *</label>
									<input type="text" class="datepicker form-control" name="tdate" value="{{ old('tdate') }}"  data-date-format="yyyy-mm-dd" readonly>
								</div>
								
								@if(empty($services->room))
									
								@else
									<div class="form-group">
	                                <label for="room">Number Of Rooms *</label>
	                                <select class="form-control form-control-lg" name="room">
	                                    @switch($services->id)
	                                        @case (1)
	                                            <option  value="1">1</option>
	                                            <option  value="2">2</option>
	                                            <option  value="3">3</option>
	                                            <option  value="4">4</option>
	                                            @break
	                                        @case (2)
	                                            <option  value="1">1</option>
	                                            <option  value="2">2</option>
	                                            <option  value="3">3</option>
	                                            <option  value="4">4</option>
	                                            <option  value="5">5</option>
	                                            <option  value="6">6</option>
	                                            @break
	                                        @case (3)
	                                            <option  value="1">1</option>
	                                            <option  value="2">2</option>
	                                            <option  value="3">3</option>
	                                            <option  value="4">4</option>
	                                            <option  value="5">5</option>
	                                            <option  value="6">6</option>
	                                            <option  value="7">7</option>
	                                            <option  value="8">8</option>
	                                            <option  value="9">9</option>
	                                            @break
	                                        @case (4)
	                                            <option  value="1">1</option>
	                                            <option  value="2">2</option>
	                                            <option  value="3">3</option>
	                                            <option  value="4">4</option>
	                                            <option  value="5">5</option>
	                                            <option  value="6">6</option>
	                                            <option  value="7">7</option>
	                                            @break
	                                    @endswitch
	                                </select>
	                            </div>
	                            @endif

	                            <div class="form-group">
	                                <label for="status">Time Slot *</label>
	                                <select class="form-control form-control-lg" name="service_config_id">
	                                    <option value="{{ old('service_config_id') }}"  selected>Please Select Time</option>
	                                    @foreach($service_configs as $service_config)
		                                    <option  value="{{$service_config->id}}">
		                                    	{{$service_config->check_in}} - {{$service_config->check_out}}
		                            		</option>
	                                    @endforeach
	                                </select>
	                            </div>
	                           

	                            <div class="form-group">
	                                <label for="event_type">Event Type </label>
	                                <select class="form-control form-control-lg" name="event_type">
	                                    <option value="{{ old('event_type') }}"  selected>Please Select Event Type</option>
	                                    @foreach($event as $events)
	                                        <option  value="{{$events->id}}">{{$events->name}}</option>
	                                    @endforeach
	                                </select>
	                            </div>

	                            @if(empty(Auth::user()->kib_number))
	                            	<div class="form-group">
		                                <label for="">Are You A KIB Member?</label>
		                                <br>
		                                <label for="check1">Yes</label>
		                                <input type="checkbox" id="check1"  onclick="myFunction(this.id)">
		                                <label for="check2">No</label>
		                                <input type="checkbox" id="check2"  onclick="myFunction(this.id)">
		                                <input type="text" id="kib" name="kib_number" class="form-control" style="display: none;" placeholder="Enter Your KIB Code Number">
		                            </div>
		                        @else
		                            <label for="">Kib Member Code</label>
		                        	<input type="text" id="kib" name="kib_number" class="form-control" value="{{Auth::user()->kib_number}}" readonly>
		                            
		                         @endif

	                            <div class="form-group">
	                                <label for="">Number Of Guest *</label>
	                                <input type="number" class="form-control" value="{{ old('guest') }}" name="guest"  placeholder="Enter Number of Guest">
	                            </div>

	                            
	                            <div class="form-group">
	                                <label for="">Notes </label>
	                                <textarea rows="3" class="form-control" name="note" placeholder="Enter Your Notes"  value="{{ old('note') }}" ></textarea>
	                            </div>

	                            </div>
	                        <!-- /.box-body -->

	                        <div class="box-footer">
	                            <button type="submit" class="py-2 btn btn-primary btn-block btn-lg">Submit</button>
	                        </div>
	                    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>

<div class="elementor-element elementor-element-a935343 elementor-column elementor-col-50 elementor-top-column" data-id="a935343" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
					<div class="elementor-widget-wrap">
				
				<div class="elementor-element elementor-element-60cddc6 elementor-widget elementor-widget-text-editor" data-id="60cddc6" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix">
						<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-4eb140e elementor-widget elementor-widget-heading" data-id="4eb140e" data-element_type="widget" data-widget_type="heading.default">
					<div class="elementor-widget-container">
						<h2 class="my-3 py-3"><b>Terms & Condition</b></h2>
					</div>
				</div>
				<div class="elementor-element elementor-element-7190bcd elementor-widget elementor-widget-text-editor" data-id="7190bcd" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<h3 class="elementor-text-editor elementor-clearfix">
						{!!$services->terms_condition !!}
					</h3>
				</div>
				</div>
			</div>
					</div>
				</div>
				
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<link rel="stylesheet" type="text/css" href="{{asset('datepicker/css/bootstrap-datepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('datepicker/css/bootstrap-datepicker.min.css')}}">

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="{{asset('datepicker/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<script type="text/javascript">
	function myFunction(id) {
	    for (var i = 1;i <= 2; i++)
	    {
	        document.getElementById("check" + i).checked = false;
	    }
	    document.getElementById(id).checked = true;
	    var checkBox1 = document.getElementById("check1");
	    var checkBox2 = document.getElementById("check2");
	    var value1 = document.getElementById("kib");
	    if (checkBox1.checked == true){
	       value1.style.display = "block";
	    }
	    else if (checkBox2.checked == true) {
	      value1.style.display = "none";
	    }
	    else {
	        value1.style.display = "none";
	    }
	}
</script>

<script type="text/javascript">
	$('.datepicker').datepicker({
    startDate: '+14d',
    endDate: '+730d',
    autoclose:true
});
</script>

@endsection
