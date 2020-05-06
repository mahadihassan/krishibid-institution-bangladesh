@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Booking Payment
            <small>Enter Payment Log Info here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payment Log</li>
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
                        <h2 class="box-title">Payment Log </h2>
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
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">User Name
                    <span class="badge badge-primary badge-pill">{{$servicebooking->User->name}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">User Email
                    <span class="badge badge-primary badge-pill">{{$servicebooking->User->email}}</span>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center">Booking Id Number
                    <span class="badge badge-danger badge-pill">{{$bookingId->booking_id}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Service Name
                    <span class="badge badge-danger badge-pill">{{$servicebooking->Service->name}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Event Type
                    <span class="badge badge-danger badge-pill">{{$servicebooking->Event->name}}</span>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center">Event Date
                    <span class="badge badge-danger badge-pill">{{$servicebooking->from_date}}</span>
                  </li>
                  <h4 class="text-center">Payment History</h4>
                    @foreach($payment as $payments)
                        <li class="list-group-item d-flex justify-content-between align-items-center">{{$payments->payment_modes_id}}
                            <span class="badge badge-danger badge-pill">{{$payments->total_amount}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Payment Date
                            <span class="badge badge-danger badge-pill">{{$payments->payment_date}}</span>
                        </li>
                    @endforeach
                    <hr>
                    <li class="list-group-item d-flex justify-content-between align-items-center">Total Payment Amount
                    <span class="badge badge-danger badge-pill">{{$total_payment}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Total Due Amount
                    <span class="badge badge-danger badge-pill">{{$data}}</span>
                  </li>
                </ul>
                <a href="{{route('admin.Booking.index')}}" class="btn btn-block btn-info">Back</a>
                {{--<a href="{{route('admin.data', $servicebooking->id)}}" class="btn btn-block btn-info">Downloade</a>--}}
                </div>
            </div>
        </div>
    </section>
@endsection