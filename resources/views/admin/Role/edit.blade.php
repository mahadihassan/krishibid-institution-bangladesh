@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Role
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Role</li>
        </ol>
    </section>

    <br>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-10">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Role Create</h3>
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
                    <form role="form" method="post" action="{{route('admin.Role.update', $role->id)}}" enctype="multipart/form-data">
                       @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Name <font color="red">*</font></label>
                                <input type="text" class="form-control" name="name" value="{{$role->name}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Event Permission</label>
                            @foreach($permission as $permissions)
                                @if($permissions->slug == 'event')
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]" value="{{$permissions->id}}"
                                        @foreach($role->permissions as $per)
                                            @if($per->id == $permissions->id)
                                                checked
                                            @endif
                                        @endforeach 
                                         >{{$permissions->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <label>Service Permission</label>
                            @foreach($permission as $permissions)
                                @if($permissions->slug == 'service')
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]"  value="{{$permissions->id}}" 
                                        @foreach($role->permissions as $per)
                                            @if($per->id == $permissions->id)
                                                checked
                                            @endif
                                        @endforeach 
                                        >{{$permissions->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <label>ServiceType Permission</label>
                            @foreach($permission as $permissions)
                                @if($permissions->slug == 'servicetype')
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]" value="{{$permissions->id}}" 
                                        @foreach($role->permissions as $per)
                                            @if($per->id == $permissions->id)
                                                checked
                                            @endif
                                        @endforeach 
                                            >{{$permissions->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <label>User Permission</label>
                            @foreach($permission as $permissions)
                                @if($permissions->slug == 'user')
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]"  value="{{$permissions->id}}" 
                                        @foreach($role->permissions as $per)
                                            @if($per->id == $permissions->id)
                                                checked
                                            @endif
                                        @endforeach 
                                        >{{$permissions->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <label>ServiceConfigure Permission</label>
                            @foreach($permission as $permissions)
                                @if($permissions->slug == 'serviceconfigure')
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]" value="{{$permissions->id}}" 
                                        @foreach($role->permissions as $per)
                                            @if($per->id == $permissions->id)
                                                checked
                                            @endif
                                        @endforeach 
                                        >{{$permissions->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <label>Service Booking Permission</label>
                            @foreach($permission as $permissions)
                                @if($permissions->slug == 'servicebooking' || $permissions->slug == 'payment')
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]" value="{{$permissions->id}}" 
                                        @foreach($role->permissions as $per)
                                            @if($per->id == $permissions->id)
                                                checked
                                            @endif
                                        @endforeach 
                                            >{{$permissions->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <label>Slider Permission</label>
                            @foreach($permission as $permissions)
                                @if($permissions->slug == 'slider')
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]" value="{{$permissions->id}}" 
                                        @foreach($role->permissions as $per)
                                            @if($per->id == $permissions->id)
                                                checked
                                            @endif
                                        @endforeach 
                                        >{{$permissions->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <label>Role Permission</label>
                            @foreach($permission as $permissions)
                                @if($permissions->slug == 'role')
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]" value="{{$permissions->id}}"
                                        @foreach($role->permissions as $per)
                                            @if($per->id == $permissions->id)
                                                checked
                                            @endif
                                        @endforeach 
                                            >{{$permissions->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <label> Permission</label>
                            @foreach($permission as $permissions)
                                @if($permissions->slug == 'permission')
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]" value="{{$permissions->id}}"
                                        @foreach($role->permissions as $per)
                                            @if($per->id == $permissions->id)
                                                checked
                                            @endif
                                        @endforeach 
                                            >{{$permissions->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

