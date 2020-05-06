@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Booking
            <small>Enter Service Booking Published Info here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Service Booking Published</li>
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
                    <form role="form" method="post" action="{{route('admin.Published-Update', $servicebooking->id)}}" enctype="multipart/form-data">
                       @csrf
                        @method('POST')
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
                                        <label for="status" id="services">ServiceType</label>
                                        <input type="text" class="form-control" id="service" value="{{$servicebooking->ServiceType->name}}" readonly="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status" id="services">Service</label>
                                        <input type="text" class="form-control" id="service" value="{{$servicebooking->Service->name}}" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status" id="services">Event</label>
                                        <input type="text" class="form-control" id="service" value="{{$servicebooking->Event->name}}" readonly="">
                                    </div>
                                </div>
                                
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
                                        <label for="status" id="services">Discount</label>
                                        <input type="text" class="form-control" id="service" value="{{$servicebooking->discount}}" readonly="">
                                    </div>
                                </div>

                                 <div class="col-md-6">
                                    <label for="status" id="cost">Total Cost</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="service_cost" value="{{$servicebooking->total_cost}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reservation From Date</label>
                                            <input type="" class="form-control"readonly="" value="{{$servicebooking->from_date}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reservation To Date</label>
                                            <input type="" class="form-control"readonly="" value="{{$servicebooking->to_date}}">
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
    $('.datepicker').datepicker({
    startDate: '+14d',
    endDate: '+730d',
    autoclose:true
});
</script>

@endsection