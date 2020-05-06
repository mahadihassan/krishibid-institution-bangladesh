@extends('layouts.backend')
@section('content')
    <section class="content-header">
        <h1>
            Booking List
            <small>Service Booking Info</small>
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
                    <h3 class="profile-username text-center text-capitalize">Service Show Table</h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Service Type Name </b> <h5 href="#" class="pull-right">{{$services->serviceType->name}}</h5>
                            </li>
                            <li class="list-group-item">
                                <b>Service Name </b> <h5 class="pull-right">{{$services->name}}</h5>
                            </li>
                            <li class="list-group-item">
                                <b>Image</b> <img style="width:18%;" class="img-responsive" src="{{ asset('Image/Service') }}/{{ $services->image }}">
                            </li>
                            <li class="list-group-item">
                                <b>Service Price</b> <h5 class="pull-right">{{$services->price}} BDT</h5>
                            </li>
                            
                            <li class="list-group-item">
                                <b>Capacity</b> <h5 class="pull-right">{{$services->capacity}}</h5>
                            </li>
                            <li class="list-group-item">
                                <b>Description :</b> 
                                <hr>
                                <p class="pull-right">{!! $services->description !!}</p>
                            </li>
                            <li class="list-group-item">
                                <b>Terms Conditions:</b> <hr><p class="pull-right">{!! $services->terms_condition !!}</p>
                            </li>
                        </ul>
                        <a href="{{route('admin.Service.index')}}" class="btn btn-block btn-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



