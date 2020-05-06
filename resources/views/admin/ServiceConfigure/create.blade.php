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
                        <h3 class="box-title">Service Configure Create</h3>
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
                    <form role="form" method="post" action="{{route('admin.ServiceConfigure.store')}}" enctype="multipart/form-data">
                       @csrf
                        @method('POST')
                        <div class="box-body">

                             <div class="form-group">
                                <label for="status">Service Type *</label>
                                 <select class="form-control" id="service_type" name="service_type_id">
                                    <option value="" selected>Please Select Service Type</option>
                                    @foreach($servicetype as $servicetypes)
                                        <option  value="{{$servicetypes->id}}">{{$servicetypes->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Service *</label>
                                <select class="form-control" name="serverice_id" id="serverice_id">
                                </select>
                            </div>

                             <div class="form-group">
                                <label for="">Time Check In *</label>
                                <div class="input-group clockpicker">
                                    <input type="text" class="form-control timepicker" name="checkin">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">Time Check Out *</label>
                                <div class="input-group clockpicker">
                                    <input type="text"  class="form-control timepicker" name="checkout">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Time Duration *</label>
                                <input type="text" class="form-control" name="duration"  placeholder="Enter Duration Time">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option  value="1" selected="">Yes</option>
                                    <option  value="0">No</option>
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
{{--@section('jsscript') --}}