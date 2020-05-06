@extends('layouts.backend')
@section('content')

    <div class="box">
        <div class="box-header" style="text-align: center">
            <h3 class="box-title">Services Configure List</h3>
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
                    <th>Service Type Name</th>
                    <th>Service Name</th>
                    <th>Check In </th>
                    <th>Check Out</th>
                    <th>Duration</th>
                    <th>Published</th>
                </tr>
                </thead>
                <tbody>
                @foreach($serviceconfig as $key => $serviceconfigs)
                    <tr>
                        <td>
                        @can('serviceconfigure.delete', Auth::user())
                            <form action="{{route('admin.ServiceConfigure.destroy', $serviceconfigs->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger fa fa-trash" onclick="return confirm('Are you sure?')"  type="submit"></button>
                        @endcan
                        @can('serviceconfigure.update', Auth::user())
                                <a href="{{route('admin.ServiceConfigure.edit', $serviceconfigs->id)}}" class="btn btn-info fa fa-edit"></a>
                        @endcan
                        @can('serviceconfigure.view', Auth::user())
                                <a href="{{route('admin.ServiceConfigure.show', $serviceconfigs->id)}}" class="btn btn-success fa fa-info"></a>
                            </form>
                        @endcan
                        </td>
                        <td>{{++$key}}</td>
                        <td>{{$serviceconfigs->serviceType->name}}</td>
                        <td>{{$serviceconfigs->service->name}}</td>
                        <td>{{$serviceconfigs->check_in}}</td>
                        <td>{{$serviceconfigs->check_out}}</td>
                        <td>{{$serviceconfigs->duration}}</td>
                        <td>
                            @if($serviceconfigs->status == 1)
                                <span class="label label-success">
                                    <i class="fa fa-arrows-h"></i> YES
                                </span>
                            @else
                                <span class="label label-danger">
                                    <i class="fa fa-arrows-h"></i> NO
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

