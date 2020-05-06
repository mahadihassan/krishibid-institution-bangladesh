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
                        <th>Slug Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($permission as $key => $permissions)
                    <tr>
                        <td>
                        @can('permission.delete', Auth::user())
                            <form action="{{route('admin.Permission.destroy', $permissions->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger fa fa-trash my-5" onclick="return confirm('Are you sure?')"  type="submit"></button>
                        @endcan
                        @can('permission.update', Auth::user())
                                <a href="{{route('admin.Permission.edit', $permissions->id)}}" class="btn btn-info fa fa-edit"></a>
                        @endcan
                            </form>
                        </td>
                        <td>{{++$key}}</td>
                        <td>{{$permissions->name}}</td>
                        <td>{{$permissions->slug}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

