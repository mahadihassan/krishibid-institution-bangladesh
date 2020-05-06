@extends('layouts.backend')
@section('content')
    <section class="content-header">
        <h1>
            Service Configure List
            <small>Service Configure Info</small>
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
                    <h3 class="profile-username text-center text-capitalize"></h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Service Type </b> <a class="pull-right">{{$serviceconfigure->serviceType->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Service Name</b> <a class="pull-right">{{$serviceconfigure->service->name}}</a>
                            </li>

                            <li class="list-group-item">
                                <b>Check In Time</b> 
                                <a class="pull-right">
                                    @if( ($serviceconfigure->check_in) < 12 )
                                        {{date("h:i", strtotime($serviceconfigure->check_in)) }}AM
                                    @else
                                        {{date("h:i", strtotime($serviceconfigure->check_in)) }}PM
                                    @endif
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Check Out Time</b> 
                                <a class="pull-right">
                                    @if( ($serviceconfigure->check_out) < 12 )
                                        {{date("h:i", strtotime($serviceconfigure->check_out)) }}AM
                                    @else
                                        {{date("h:i", strtotime($serviceconfigure->check_out)) }}PM
                                    @endif
                                </a>
                            </li>


                            <li class="list-group-item">
                                <b>Duration</b> <a class="pull-right">{{$serviceconfigure->duration}}</a>
                            </li>
                        </ul>
                        <a href="{{route('admin.ServiceConfigure.index')}}" class="btn btn-block btn-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



