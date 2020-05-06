@extends('layouts.backend')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">User List</h3>
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
        <div class="box-body ">
            <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Delete</th>
                        <th>Action</th>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Kib Number</th>
                        <th>Published</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($user as $key => $users)
                    <tr>
                        <td>
                        @can('users.delete', Auth::user())
                            <form action="{{route('admin.User.destroy', $users->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger fa fa-trash my-5" onclick="return confirm('Are you sure?')"  type="submit"></button>
                            </form>
                        @endcan
                        </td>
                        <td class="col-md-2">
                        @can('users.update', Auth::user())
                            <form action="{{route('admin.StatusEdit', $users->id)}}" method="post">
                                @csrf
                                @method('POST')
                                <button class="btn btn-primary fa fa-reply"  type="submit"></button>
                                <a href="{{route('admin.User.edit', $users->id)}}" class="btn btn-info fa fa-edit"></a>
                            </form> 
                        @endcan   

                        </td>
                        <td>{{++$key}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->phone}}</td>
                        <td>
                            @foreach($role as $roles)
                                @if(in_array($roles->id, explode(',', $users->user_role)))
                                    @if($loop->last)
                                        <span class="badge badge-secondary">{{$roles->name}}</span>
                                    @else
                                       <span class="badge badge-info">{{$roles->name}}</span>
                                    @endif
                                @endif                  
                            @endforeach
                        </td>
                        <td>{{$users->kib_number}}</td>
                        <td>
                            @if($users->status == 1)
                                <span class="label label-success">
                                    <i class="fa fa-arrows-h"></i>Yes
                                </span>
                            @else
                                <span class="label label-danger">
                                    <i class="fa fa-arrows-h"></i>No
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

