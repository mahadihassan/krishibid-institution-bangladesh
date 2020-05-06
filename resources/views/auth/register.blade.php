@extends('layouts.frontend')
@section('content')


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
                    <div class="elementor-custom-embed">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <style type="text/css">
                                            .form-control{
                                                font-size: 15px;
                                            }
                                        </style>
                                        <h3 class="text-center py-3">Sign up</h3>
                                        <div class="card-body">
                                            <form method="POST" class="form" action="{{ route('register') }}">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name"  placeholder="Enter Your Name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback py-3" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter Your Email">

                                                        @error('email')
                                                            <span class="invalid-feedback py-3" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"placeholder="Enter Your Phone Number">

                                                        @error('phone')
                                                            <span class="invalid-feedback py-3" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="kib" class="col-md-4 col-form-label text-md-right">{{ __('Are You A KIB Member ?') }}</label>
                                                    <div class="col-md-6 py-3">
                                                        <label for="check1">Yes</label>
                                                            <input type="checkbox" id="check1" onclick="myFunction(this.id)">
                                                        <label for="check2">No</label>
                                                            <input type="checkbox" id="check2"  onclick="myFunction(this.id)">
                                                            <input type="text" id="kib" name="kib_number" class="form-control my-3" style="display: none;" placeholder="Enter Your KIB Code Number">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback py-3" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary btn-lg">
                                                            {{ __('Sign up') }}
                                                        </button>
                                                        <a href="{{route('login')}}" class="btn btn-success btn-lg text-light">Sign in</a>
                                                    </div>
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
    </div>
</div>
</div>
</section>


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

@endsection
