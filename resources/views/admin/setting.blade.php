@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Setting
            <small>Setting Info here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Setting</li>
        </ol>
    </section>

    <br>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8" >
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                      @if(session()->has('message'))
                            <div class="">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aira-hidden="true">
                                        &times;
                                    </button>
                                    {{session()->get('message')}}
                                </div>

                            </div>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admin.setting-store')}}" enctype="multipart/form-data">
                       @csrf
                        @method('POST')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Web Site Title *</label>
                                <input type="text" class="form-control" name="title" value="{{$setting->site_title}}">
                            </div>

                            <div class="form-group">
                                <label for="">Web Site Slow Gaan *</label>
                                <input type="text" class="form-control" name="site_slowgaan" value="{{$setting->site_slowgaan}}">
                            </div>

                            <div class="form-group">
                                <label for="">Admin Email *</label>
                                <input type="text" class="form-control" name="email" value="{{$setting->admin_email}}">
                            </div>

                            <div class="form-group">
                                <label for="">Admin Phone Number  *</label>
                                <input type="text" class="form-control" name="phone" value="{{$setting->phone}}">
                            </div>

                             <label for="">Web Site Logo *</label>
                            <img style="width:30%;" class="img-responsive" src="{{ asset('frontend/image') }}/{{ $setting->logo }}">

                            <div class="form-group">
                                <label for="exampleFormControlFile1">File input</label>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            </div>

                            <div class="form-group">
                                <label for="">Contact Map *</label>
                                <input type="text" class="form-control" name="contact_map" value="{{$setting->contact_map}}">
                            </div>

                            <div class="form-group">
                                <label for="">Address *</label>
                                <textarea rows="3" class="form-control" name="address">{!! $setting->address !!}</textarea>
                            </div>

                             <div class="form-group">
                                <label for="">Meta Tag</label>
                                <input type="text" class="form-control" name="meta_type" value="{{$setting->meta_type}}">
                            </div>

                            <div class="form-group">
                                <label for="">Copy Right *</label>
                                <input type="text" class="form-control" name="copyright" value="{{$setting->copyright}}">
                            </div>

                            </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'address' );
</script>
@endsection

