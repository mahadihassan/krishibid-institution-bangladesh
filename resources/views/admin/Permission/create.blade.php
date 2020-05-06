@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Permission
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Permission</li>
        </ol>
    </section>

    <br>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Permission Create</h3>
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
                    <form role="form" method="post" action="{{route('admin.Permission.store')}}" enctype="multipart/form-data">
                       @csrf
                        @method('POST')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Name <font color="red">*</font></label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter Permission Name">
                            </div>

                            <div class="form-group">
                                <label for="">Permission For <font color="red">*</font></label>
                                <select class="form-control" name="slug">
                                    <option  value="0">Please Select For Permission</option>
                                    <option  value="service">Service</option>
                                    <option  value="servicetype">ServiceType</option>
                                    <option  value="serviceconfigure">ServiceConfigure</option>
                                    <option  value="servicebooking">ServiceBooking</option>
                                    <option value="role">Role</option>
                                    <option value="permission">Permission</option>
                                    <option  value="slider">Slider</option>
                                    <option  value="user">User</option>
                                    <option  value="payment">Payment</option>
                                    <option value="event" >Event</option>
                                </select>
                            </div>
                        </div>

                {{--<div class="row">
                    <div class="col-md-12">
                       @foreach($permission as $value)
                            <div class="col-md-3" style="border:1px solid Black;  margin:10px;">
                                <div class="row text-center" style="border-bottom:1px solid Black;"><strong>{{$value->pagename}}<strong>
                                </div>
                                @if($permi=App\Permission::Where('pagename',$value->pagename)->get())
                                   @foreach($permi as $value2)
                                        <label><input class="case" type="checkbox" value="{{$value2->id}}" name="permission[]"><lable>{{$value2->name}}</lable></label>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>--}}
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
