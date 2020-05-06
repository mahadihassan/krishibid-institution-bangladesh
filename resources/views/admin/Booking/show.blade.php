@extends('layouts.backend')
@section('content')
    <section class="content-header">
        <h1>
            Booking List
            <small>Service Booking Show Info</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <br>

<div class="row">
    <div class="content">
        <div class="col-md-7">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <h3 class="profile-username text-center text-capitalize">{{$showbooking->User->name}}</h3>
                        <p class="text-muted text-center">{{$showbooking->User->email}}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Phone Number</b> <a class="pull-right">{{$showbooking->User->phone}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Service Type</b> <a class="pull-right">{{$showbooking->ServiceConfigure->ServiceType->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Service Name</b> <a class="pull-right">{{$showbooking->service->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Event Type</b> <a class="pull-right">{{$showbooking->Event->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Service Price</b> <a class="pull-right">{{$showbooking->service_cost}} BDT</a>
                            </li>

                            <li class="list-group-item">
                                <b>Total Tax</b> <a class="pull-right">{{$showbooking->service_tax + $showbooking->car_tax}} BDT</a>
                            </li>

                            <li class="list-group-item">
                                <b>Discount</b> <a class="pull-right">{{$showbooking->discount}} BDT</a>
                            </li>

                            <li class="list-group-item">
                                <b>Total Price</b> <a class="pull-right">{{$showbooking->total_cost}} BDT</a>
                            </li>
                            
                            
                            <li class="list-group-item">
                                <b>Reservation Start Date</b> <a class="pull-right">{{$showbooking->from_date}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Reservation End Date</b> <a class="pull-right">{{$showbooking->to_date}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Check In Time</b> 
                                <a class="pull-right">
                                    @if( ($showbooking->ServiceConfigure->check_in) < 12 )
                                        {{date("h:i", strtotime($showbooking->ServiceConfigure->check_in)) }}AM
                                    @else
                                        {{date("h:i", strtotime($showbooking->ServiceConfigure->check_in)) }}PM
                                    @endif
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Check Out Time</b> 
                                <a class="pull-right">
                                    @if( ($showbooking->ServiceConfigure->check_out) < 12 )
                                        {{date("h:i", strtotime($showbooking->ServiceConfigure->check_out)) }}AM
                                    @else
                                        {{date("h:i", strtotime($showbooking->ServiceConfigure->check_out)) }}PM
                                    @endif
                                </a>
                            </li>
                        </ul>
                        <a href="{{route('admin.Booking.index')}}" class="btn btn-block btn-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



