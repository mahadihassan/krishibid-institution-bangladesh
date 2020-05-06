@extends('layouts.frontend')
@section('content')


<section class="elementor-element elementor-element-f75e305 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section">
<div class="elementor-container elementor-column-gap-default">
	<div class="elementor-row">
				<div class="elementor-element elementor-element-ad386d4 elementor-column elementor-col-100 elementor-top-column" data-id="ad386d4" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
				<div class="elementor-widget-wrap">
				<div class="elementor-element elementor-element-4eb140e elementor-widget elementor-widget-heading" data-id="4eb140e" data-element_type="widget" data-widget_type="heading.default">
					<div class="elementor-widget-container">
						<iframe style="height: 350px;" src="{!! $setting->contact_map !!}" aria-label="Krishibid Institution Bangladesh"></iframe>
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
				<div class="elementor-element elementor-element-7190bcd elementor-widget elementor-widget-text-editor" data-id="7190bcd" data-element_type="widget" data-widget_type="text-editor.default">
				
						<div class="container">
        					<div class="row"> 
          						<div class="col-md-6">
									@if(Session::has('message'))
						    			<div class="alert alert-success">
						        			{{ Session::get('message') }}
						    			</div>
						    		@else
						    		@endif

						    		<style>
						    			.form-control{
						    				font-size: 18px;
						    			}
						    		</style>
            						<form class="bg-white" action="{{route('contact-store')}}" method="post">
            							@csrf
              							@method('POST')
              						<div class="row form-group">
                						<div class="col-md-6 mb-3">
                  							<label class="text-black" for="fname">First Name</label>
                  							<input type="text" id="fname" name="fname" class="form-control">
                						</div>
                						<div class="col-md-6">
                  							<label class="text-black" for="lname">Last Name</label>
                  							<input type="text" id="lname" name="lname" class="form-control">
                						</div>
              						</div>

              					<div class="row form-group">
                					<div class="col-md-12">
                  						<label class="text-black" for="email">Email</label>
                 						<input type="email" id="email" name="email" class="form-control">
                					</div>
              					</div>

				              <div class="row form-group">
				                <div class="col-md-12">
				                  <label class="text-black" for="message">Message</label>
				                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
				                </div>
				              </div>

				              <div class="row form-group">
				                <div class="col-md-12">
				                  <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
				                </div>
				              </div>
            				</form>
          				</div>
          				<div class="col-md-6 py-0 my-0">
			          		{!! $setting->address !!}
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
@endsection