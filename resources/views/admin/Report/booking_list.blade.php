@extends('layouts.backend')
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
             <div class="box box-success box-body">
            <div class="formtxt">
                <form method="GET" action="{{route('admin.Reportshow')}}">
                    @method('GET')
                    <div class="row">
                        <div class="col-md-3">
                            <label for="service">User Name</label>
                            <select class="form-control text-capitalize" name="users_id">
                                <option value="" selected="">Choose User</option>
                                @foreach($user as $users)
                                    <option value="{{$users->id}}">{{$users->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="service">Service Category</label>
                            <select class="form-control" name="servicetypes">
                                <option value="" selected="">Choose Service Category</option>
                                @foreach($servicetype as $servicetypes)
                                    <option value="{{$servicetypes->id}}">{{$servicetypes->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-3">
                            <label for="service">Service Name</label>
                            <select class="form-control" name="services">
                                <option value="" selected="">Choose Service</option>
                                @foreach($service as $services)
                                    <option value="{{$services->id}}">{{$services->name}}</option>
                                @endforeach
                            </select>
                        </div>

                         <div class="col-md-3">
                            <label for="service">Event Type</label>
                            <select class="form-control" name="events">
                                <option value="" selected="">Choose Event</option>
                                @foreach($event as $events)
                                    <option value="{{$events->id}}">{{$events->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3" style="padding: 10px;">
                            <label class="">Status *</label>
                            <select class="form-control" name="status">
                                <option selected="">Choose Status</option>
                                <option  value="0">Pending</option>
                                <option  value="1">Approved</option>
                                <option  value="2">Cancel</option>
                            </select>
                        </div>

                        <div class="col-md-3" style="padding: 10px;">
                            <label>Reservation From Date</label>
                            <input type="" name="from" class="form-control datepicker" data-date-format="yyyy-mm-dd" readonly="">
                        </div>

                        <div class="col-md-3" style="padding: 10px;">
                            <label>Reservation To Date</label>
                            <input type="" name="to" class="form-control datepicker" data-date-format="yyyy-mm-dd" readonly="">
                        </div>

                        <div class="col-md-3" style="padding: 10px;">
                            <label>Reservation Created Date </label>
                            <input type="" name="created_at" class="form-control datepicker" data-date-format="yyyy-mm-dd" readonly="">
                        </div>
                    </div>
                    <div class="row" style="padding: 10px">
                        <button type="submit" class="btn btn-info center-block">See Report</button>
                    </div>
                </form>
            </div>
        </div>

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
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($booking as $key => $bookings)
                    <tr>
                        <td class="col-sm-2">
                            <form action="{{route('admin.Booking.destroy', $bookings->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger fa fa-trash" onclick="return confirm('Are you sure?')"  type="submit"></button>
                                <a href="{{route('admin.Booking.edit', $bookings->id)}}" class="btn btn-info fa fa-edit"></a>
                                <a href="{{route('admin.Booking.show', $bookings->id)}}" class="btn btn-success fa fa-info"></a>
                            </form>
                        </td>
                        <td>{{++$key}}</td>
                        <td>{{$bookings->User->name}}</td>
                        <td>{{$bookings->service->name}}</td>
                        <td>{{$bookings->from_date}}</td>
                        <td>{{$bookings->Event->name}}</td>
                        <td>{{$bookings->total_cost}} BDT</td>
                        <td>{{ date("yy-m-d", strtotime($bookings->created_at)) }}</td>
                        <td>
                            @if($bookings->status == 1)
                                <span class="label label-success">
                                    <i class="fa fa-arrows-h"></i>Approved
                                </span>
                            @elseif($bookings->status == 2)
                                <span class="label label-danger">
                                    <i class="fa fa-arrows-h"></i>Cancel
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


<link rel="stylesheet" type="text/css" href="{{asset('datepicker/css/bootstrap-datepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('datepicker/css/bootstrap-datepicker.min.css')}}">

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="{{asset('datepicker/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('datepicker/js/bootstrap-datepicker.min.js')}}"></script>


<script type="text/javascript">
    $('.datepicker').datepicker({
    autoclose:true
});
</script>

@endsection
