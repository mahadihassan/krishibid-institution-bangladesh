@extends('layouts.backend')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Event Type List</h3>
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
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($role as $key => $roles)
                    <tr>
                        <td>
                            <form action="{{route('admin.Role.destroy', $roles->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger fa fa-trash my-5" onclick="return confirm('Are you sure?')"  type="submit"></button>
                                <a href="{{route('admin.Role.edit', $roles->id)}}" class="btn btn-info fa fa-edit"></a>
                            </form>
                        </td>
                        <td>{{++$key}}</td>
                        <td>{{$roles->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

