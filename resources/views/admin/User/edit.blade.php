@extends('layouts.backend')
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary ">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">User Edit</h3>
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
                    <form role="form" method="post" action="{{route('admin.User.update', $userData->id)}}">
                       @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Name <font color="red">*</font> </label>
                                <input type="text" class="form-control" name="name" value="{{$userData->name}}">
                            </div>

                            <div class="form-group">
                                <label for="">Email<font color="red">*</font> </label>
                                <input type="email" class="form-control" name="email" value="{{$userData->email}}" readonly="">
                            </div>

                            

                            <div class="form-group">
                                <label for="">Phone Number <font color="red">*</font> </label>
                                <input type="text" class="form-control" name="phone" value="{{$userData->phone}}">
                            </div>

                            <div class="form-group">
                                <label for="status">User Role</label>
                                <select class="form-control" name="role">
                                    @foreach($role as $roles)
                                        @if($roles->id == $userData->user_role)
                                            <option value="{{$roles->id}}" selected="">{{$roles->name}}</option>
                                        @else
                                             <option value="{{$roles->id}}">{{$roles->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            @if((empty($userData->kib_number)))

                            @else
                                <div class="form-group">
                                    <label for="">Kib Number </label>
                                    <input type="text" class="form-control" name="kib_number" value="{{$userData->kib_number}}">
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="">Password <font color="red">*</font></label>
                                <input type="password" class="form-control" name="password" value="">
                            </div>

                            <div class="form-group">
                                <label for="">Confirm Password <font color="red">*</font></label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    @switch($userData->status)
                                        @case (1):
                                            <option  value="1" selected="">Yes</option>
                                            <option  value="0">No</option>
                                            @break;
                                        @case (0):
                                            <option  value="1">Yes</option>
                                            <option  value="0" selected="">No</option>
                                            @break;
                                    @endswitch
                                </select>
                            </div>
                           
                            </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
