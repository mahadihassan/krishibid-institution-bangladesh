@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Booking
            <small>Enter Service Booking Payment Info here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Service Booking Payment</li>
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
                    <form role="form" method="post" action="{{route('admin.Payment-Update', $servicebooking->id)}}" enctype="multipart/form-data">
                       @csrf
                       @method('POST')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">User Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$servicebooking->User->name}}" readonly>
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
                                        <input type="text" class="form-control" value="{{$servicebooking->User->kib_number}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Booking Id</label>
                                        <input type="text" class="form-control" name="booking_id" value="{{$bookingId->booking_id}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Reservation Created Date</label>
                                        <input type="text" class="form-control" value="{{date("yy-m-d", strtotime($servicebooking->created_at))}}" readonly>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Service</label>
                                        <input type="text" class="form-control" name="service" value="{{$servicebooking->Service->name}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Event</label>
                                        <input type="text" class="form-control" value="{{$servicebooking->Event->name}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <h4 class="text-center"><b>Payment Details</b></h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Unit Cost</label>
                                        <input type="text" class="form-control" name="unit_cost" value="{{$servicebooking->service_cost}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Tax</label>
                                        <input type="text" class="form-control" name="tax1" value="{{$servicebooking->service_tax}}" readonly>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Car Parking</label>
                                        <input type="text" class="form-control" value="{{$servicebooking->car_parking}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Tax</label>
                                        <input type="text" class="form-control" name="tax2" value="{{$servicebooking->car_tax}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Discount</label>
                                        <input type="text" class="form-control" value="{{$servicebooking->discount}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Total Cost</label>
                                        <input type="text" class="form-control" value="{{$servicebooking->total_cost}}" readonly>
                                    </div>
                                </div>
                            </div>

                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Total Payment
                                    <span class="badge badge-primary">{{$total_payment}} BDT</span>
                                    </li>
                                </ul>
                
                            <div class="form-group">
                                <label for="amount">Due</label>
                                    <input type="text" class="form-control" id="due" name ="due" value="{{$data}}" readonly="">
                            </div>

                            <div class="form-group">
                                <label for="service_type">Payment Mode</label>
                                 <select class="form-control" id="paymentmode" name="paymentmode" >
                                        <option value="">Choose Payment Method</option>
                                    @foreach($paymentmode as $paymentmodes)
                                        <option  value="{{$paymentmodes->name}}">{{$paymentmodes->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount">Payment Amount</label>
                                        <input type="text" class="form-control" id="amount" name="amount" disabled="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Payment Date</label>
                                        <input type="" name="payment_date" id="payment_date" class="form-control datepicker" data-date-format="yyyy-mm-dd" disabled="" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="amount">After Pyment Due</label>
                                <input type="text" class="form-control" id="after_payment" name="after_payment" readonly="">
                            </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            <a href="{{route('admin.Booking.index')}}" class="btn btn-block btn-info">Back</a>
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
$(document).ready(function(){
    $("#paymentmode").change(function(){
        $( "#amount" ).prop( "disabled", false );
        $( "#payment_date" ).prop( "disabled", false );
        $('.datepicker').datepicker({
            autoclose:true
        });
    });
})

$(document).on('input','#amount',function(){
    var due = $('#due').val();
    var amount = $("#amount").val();
    $('#after_payment').val(due - amount);
    if ($("#after_payment").val() < '0') {
        alert("Not a valid This Amount")
    }
});
</script>
@endsection