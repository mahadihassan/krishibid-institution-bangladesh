@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Service
            <small>Enter Service Configure Info here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Service Configure</li>
        </ol>
    </section>

    <br>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8" >
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Service Configure Edit</h3>
                      @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">

                                    <button type="button" class="close" data-dismiss="alert" aira-hidden="true">
                                        &times;
                                    </button>
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admin.ServiceConfigure.update', $serviceconfigure->id)}}" enctype="multipart/form-data">
                       @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="service_type">Service Type *</label>
                                 <select class="form-control" id="service_type" name="service_type_id">
                                    @foreach($servicetype as $servicetypes)
                                        @if($servicetypes->id == $serviceconfigure->service_types_id)
                                            <option  value="{{$servicetypes->id}}" selected>{{$servicetypes->name}}</option>
                                        @else
                                            <option  value="{{$servicetypes->id}}">{{$servicetypes->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Service *</label>
                                <select class="form-control" name="serverice_id" id="serverice_id">
                                    @foreach($service as $services)
                                        @if($services->id == $serviceconfigure->services_id)
                                            <option  value="{{$services->id}}" selected>{{$services->name}}</option>
                                        @else
                                            <option  value="{{$services->id}}">{{$services->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Time Check In *</label>
                                <div class="input-group clockpicker">
                                    <input type="text" class="form-control timepicker" name="checkin" value="{{$serviceconfigure->check_in}}">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">Time Check Out *</label>
                                <div class="input-group clockpicker">
                                    <input type="text" class="form-control timepicker" name="checkout" value="{{$serviceconfigure->check_out}}">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">Duration *</label>
                                <input type="number" class="form-control" value="{{$serviceconfigure->duration}}" name="duration">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    @switch($serviceconfigure->status)
                                        @case (1)
                                            <option  value="1" selected="">Yes</option>
                                            <option  value="0">No</option>
                                            @break
                                        @case (0)
                                            <option  value="1">Yes</option>
                                            <option  value="0" selected="">No</option>
                                            @break
                                    @endswitch
                                </select>
                            </div>

                            </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('backend/bootstrap/clockpicker.css')}}">
<script type="text/javascript" src="{{asset('backend/bootstrap/clockpicker.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('timepicker/mdtimepicker.css')}}">
<script type="text/javascript" src="{{asset('timepicker/mdtimepicker.js')}}"></script>

<script type="text/javascript">
  $('.timepicker').mdtimepicker();
</script>

<script type="text/javascript">
    $('#service_type').change(function(){
    var serviceTypeID = $(this).val();    
    if(serviceTypeID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get-service')}}?service_type_id="+serviceTypeID,
           success:function(res){               
            if(res){
                $("#serverice_id").empty();
                $("#serverice_id").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#serverice_id").append('<option value="'+key+'">'+value+'</option>');
                });
            }else{
               $("#state").empty();
            }

           }
        });
    }    
});
</script>
@endsection