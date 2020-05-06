@extends('layouts.frontend')
@section('content')
<div class="box">
    <div class="box-header">
    <div class="box-header">
        <h3 class="box-title">Service Booking Table</h3>
        @if(count($errors)>0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="alert alert-danger">{{$error}}</li>
                    @endforeach
                </ul>
            @endif

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
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th>Action</th>
                    <th>Serial</th>
                    <th>User Name</th>
                    <th>Service Name</th>
                    <th>Start Date</th>
                    <th>Event Type</th>
                    <th>Total Cost</th>
                    <th>Published</th>
                </tr>
                </thead>
                <tbody>
                @foreach($servicebooking as $key => $servicebookings)
                    <tr>
                        <td class="col-sm-3">
                        @if($servicebookings->status == 1)
                            <a href="{{route('admin.Booking.edit', $servicebookings->id)}}" class="btn btn-info fa fa-edit"></a>
                            <a href="{{route('admin.Booking.show', $servicebookings->id)}}" class="btn btn-success fa fa-info"></a>
                            <a href="{{route('admin.Payment', $servicebookings->id)}}" class="btn btn-primary"><i class="fa fa-fw fa-credit-card"></i></a>
                            <a href="{{route('admin.PaymentLog', $servicebookings->id)}}" class="btn btn-primary"><i class="fa fa-google-wallet"></i></a>
                        @elseif($servicebookings->status == 2)
                            <a href="{{route('admin.Booking.edit', $servicebookings->id)}}" class="btn btn-info fa fa-edit"></a>
                            <a href="{{route('admin.Booking.show', $servicebookings->id)}}" class="btn btn-success fa fa-info"></a>
                            <a href="{{route('admin.Published', $servicebookings->id)}}" class="btn btn-warning"><i class="fa fa-fw fa-refresh"></i> </a>
                        @else
                            <a href="{{route('admin.Booking.edit', $servicebookings->id)}}" class="btn btn-info fa fa-edit"></a>
                            <a href="{{route('admin.Booking.show', $servicebookings->id)}}" class="btn btn-success fa fa-info"></a>
                            <a href="{{route('admin.Published', $servicebookings->id)}}" class="btn btn-warning"><i class="fa fa-fw fa-refresh"></i> </a>
                        @endif
                        </td>
                        <td>{{++$key}}</td>
                        <td>{{$servicebookings->User->name}}</td>
                        <td>{{$servicebookings->service->name}}</td>
                        <td>{{$servicebookings->to_date}}</td>
                        <td>{{$servicebookings->Event->name}}</td>
                        <td>{{$servicebookings->total_cost}} BDT</td>
                        <td>
                            @if($servicebookings->status == 1)
                                <span class="label label-success">
                                    <i class="fa fa-fw fa-check-square-o"></i>Approved
                                </span>
                            @elseif($servicebookings->status == 2)
                                <span class="label label-danger">
                                    <i class="fa fa-fw fa-trash"></i>Cancel
                                </span>
                            @else
                                <span class="label label-primary">
                                    <i class="fa fa-arrows-h"></i>Pending
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@endsection
