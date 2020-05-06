@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Booking
            <small>Enter Service Booking Info here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Service Booking Edit</li>
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
                        <h3 class="box-title">Service Booking </h3>
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

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admin.Booking.update', $servicebooking->id)}}" enctype="multipart/form-data">
                       @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">User Name</label>
                                        <input type="text" class="form-control" value="{{$servicebooking->User->name}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">User Email</label>
                                        <input type="text" class="form-control" name="email" value="{{$servicebooking->User->email}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">User Phone</label>
                                        <input type="text" class="form-control" value="{{$servicebooking->User->phone}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">User KIB Code Number</label>
                                        <input type="text" class="form-control" name="kib_number" value="{{$servicebooking->User->kib_number}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status" id="services">Service</label>
                                        <input type="text" class="form-control" id="service" value="{{$servicebooking->Service->name}}" readonly="">
                                    </div>
                                </div>
                                <input type="hidden" name="services_id" value="{{$servicebooking->services_id}}">

                                <div class="col-md-6">
                                    <label for="status" id="cost">Service Cost</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="service_cost" value="{{$servicebooking->service_cost}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reservation From Date</label>
                                            <input type="" name="fdate" id="payment_date" class="form-control datepicker" data-date-format="yyyy-mm-dd" readonly="" value="{{$servicebooking->from_date}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reservation To Date</label>
                                            <input type="" name="tdate" id="payment_date" class="form-control datepicker" data-date-format="yyyy-mm-dd" readonly="" value="{{$servicebooking->to_date}}">
                                        </div>
                                    </div>
                                </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status"/>
                                @if($servicebooking->status ==1) 
                                    <option  value="1" selected="">Approved</option>
                                    <option  value="2">Cancel</option>
                                @elseif($servicebooking->status ==2)
                                    <option  value="1">Approved</option>
                                    <option  value="2" selected="">Cancel</option>
                                @else
                                    <option  value="0" selected="">Select</option>
                                    <option  value="1">Approved</option>
                                    <option  value="2">Cancel</option>
                                @endif
                                </select>
                              </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> 

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{asset('datepicker/css/bootstrap-datepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('datepicker/css/bootstrap-datepicker.min.css')}}">
<script type="text/javascript" src="{{asset('datepicker/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('datepicker/js/bootstrap-datepicker.min.js')}}"></script>


<script type="text/javascript">
    $('.datepicker').datepicker({
    startDate: '+14d',
    endDate: '+730d',
    autoclose:true
});
</script>

{{--

<script type="text/javascript">
    $('#service_type').change(function(){
        $('#service').hide();
        $('#services').hide();
        $('#service_cost').hide();
        $('#cost').hide();
        $('#service_room').hide();
        $('#rooms').hide();
    });
</script>

<script type="text/javascript">
    $('#service_type').change(function(){
    var serviceTypeID = $(this).val();       
    if(serviceTypeID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get-booking-service')}}?service_type_id="+serviceTypeID,
           success:function(res){               
            if(res){
                $("#services_id").empty();
                $("#services_id").append('<option value="">Select</option>');
                $.each(res,function(key,value){
                    $("#services_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            }else{
               $("#services_id").empty();
            }

           }
        });
    }    
});

$('#services_id').change(function(){
var servericeId = $(this).val(); 
        if(servericeId){
            $.ajax({
               type:"GET",
               dataType: "json",
               url:"{{url('admin/get-booking-configure')}}?services_id="+servericeId,
               success:function(res){               
                if(res){
                    $("#service_config_id").empty();
                    $("#service_config_id").append('<option value="">Select</option>');
                    $.each(res,function(key,value){
                        $("#service_config_id").append('<option value="'+value.id+'">'+value.check_in+" - "+value.check_out+'</option>');
                    });
                }
                else{
                   $("#service_config_id").empty();
                }
            }
        });
        //Another ajax Call Service Price 
            $.ajax({
               type:"GET",
               dataType: "json",
               url:"{{url('admin/get-service-cost')}}?services_id="+servericeId,
               success:function(res){               
                if(res){
                    $("#service_price").empty();
                    $("#service_price").append();
                    $.each(res,function(key,value){
                        $("#service_price").val(value.price);

                    if(value.id == 1)
                    {
                        $('#room').empty();
                        $('#room').append(
                            '<option value = "1">1</option>',
                            '<option value = "2">2</option>',
                            '<option value = "3">3</option>',
                            '<option value = "4">4</option>'
                        );
                    }
                    else if(value.id == 2)
                    {
                        $('#room').empty();
                        $('#room').append(
                            '<option value = "1">1</option>',
                            '<option value = "2">2</option>',
                            '<option value = "3">3</option>',
                            '<option value = "4">4</option>',
                            '<option value = "5">5</option>',
                            '<option value = "6">6</option>'
                        );
                    }

                    else if(value.id == 3)
                    {
                        $('#room').empty();
                        $('#room').append(
                            '<option value = "1">1</option>',
                            '<option value = "2">2</option>',
                            '<option value = "3">3</option>',
                            '<option value = "4">4</option>',
                            '<option value = "5">5</option>',
                            '<option value = "6">6</option>',
                            '<option value = "7">7</option>',
                            '<option value = "8">8</option>',
                            '<option value = "9">9</option>'
                        );
                    }
                    else if(value.id == 4)
                    {
                        $('#room').empty();
                        $('#room').append(
                            '<option value = "1">1</option>',
                            '<option value = "2">2</option>',
                            '<option value = "3">3</option>',
                            '<option value = "4">4</option>',
                            '<option value = "5">5</option>',
                            '<option value = "6">6</option>',
                            '<option value = "7">7</option>'
                        );
                    }
                    else{
                        $('#room').empty();
                        $('#room').append('<option value ="" >Not Available Room For This Service</option>');
                    }
                    });
                }
                else{
                   $("#service_price").empty();
                }
            }
        });
    }
});
</script>
--}}

@endsection