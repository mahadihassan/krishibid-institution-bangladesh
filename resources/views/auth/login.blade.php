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
                                <div class="col-md-7">
                                    <div class="card">
                                        <style type="text/css">
                                            #email{
                                                font-size: 15px;
                                            }
                                        </style>
                                        <h4 class="text-center py-3">Sign in</h4>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                                        @error('email')
                                                            <span class="invalid-feedback py-3" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row my-3">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                                        @error('password')
                                                            <span class="invalid-feedback py-3" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6 offset-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                            @if (Route::has('password.request'))
                                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                    {{ __('Forgot Your Password?') }}
                                                                </a>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-8 offset-md-4">
                                                        <button type="submit" class="btn btn-primary btn-lg">
                                                            {{ __('Sign in') }}
                                                        </button>
                                                        <a href="{{route('register')}}" class="btn btn-success btn-lg text-light">Sign up</a>
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

@endsection
