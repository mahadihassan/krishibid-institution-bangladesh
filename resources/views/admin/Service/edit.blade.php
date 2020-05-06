@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Service
            <small>Enter Service Info here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Service</li>
        </ol>
    </section>

    <br>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Service Edit</h3>
                      @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admin.Service.update', $services->id)}}" enctype="multipart/form-data">
                       @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="status">Service Type *</label>
                                <select class="form-control" name="servericeType">
                                     @foreach($servericeType as $servericeTypes)
                                        @if($servericeTypes->id ==$services->service_types_id)
                                            <option  value="{{$servericeTypes->id}}" selected>{{$servericeTypes->name}}</option>
                                        @else
                                            <option  value="{{$servericeTypes->id}}">{{$servericeTypes->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Name *</label>
                                <input type="text" class="form-control" name="name" value="{{$services->name}}">
                            </div>

                            <div class="form-group">
                                <label for="">Service Cost *</label>
                                <input type="number" class="form-control" name="price" value="{{$services->price}}">
                            </div>

                            <div class="form-group">
                                <label for="">Capacity *</label>
                                <input type="number" class="form-control" name="capacity" value="{{$services->capacity}}">
                            </div>
                            <img style="width:18%;" class="img-responsive" src="{{ asset('Image/Service') }}/{{ $services->image }}">

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Service file input</label>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            </div>


                            <div class="form-group">
                                <label for="">Description *</label>
                                <textarea rows="3" class="form-control" name="description" placeholder="Enter ServiceType Description">{!! $services->description !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Terms Conditions *</label>
                                <textarea rows="3" class="form-control" name="terms_condition" placeholder="Enter ServiceType Description">{!! $services->terms_condition !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    @switch($services->status)
                                        @case (1):
                                            <option  value="1" selected="">Yes</option>
                                            <option  value="0">No</option>
                                            @break;
                                        @case (0):
                                            <option  value="1">Yes</option>
                                            <option  value="0" selected="">No</option>
                                            @break;
                                    @endswitch
                                </select>
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
    CKEDITOR.replace( 'terms_condition' );
    CKEDITOR.replace( 'description' );
</script>
@endsection
