@extends('layouts.backend')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Service Booking Table</h3>
            </div>
            <!-- /.box-header -->
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
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th>Action</th>
                    <th>Serial</th>
                    <th>Service Type</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Capacity</th>
                    <th>Description</th>
                    <th>Terms Condition</th>
                    <th>Published</th>
                </tr>
                </thead>
                <tbody>
                @foreach($service as $key => $services)
                    <tr>
                        <td class="col-sm-2">
                        @can('service.delete', Auth::user())
                            <form action="{{route('admin.Service.destroy', $services->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger fa fa-trash my-5" onclick="return confirm('Are you sure?')"  type="submit"></button>
                        @endcan
                            @can('service.update', Auth::user())
                                <a href="{{route('admin.Service.edit', $services->id)}}" class="btn btn-info fa fa-edit"></a>
                            @endcan
                            @can('service.view', Auth::user())
                                <a href="{{route('admin.Service.show', $services->id)}}" class="btn btn-success fa fa-info"></a>
                            @endcan
                            </form>
                        </td>
                        <td>{{++$key}}</td>
                        <td>{{$services->serviceType->name}}</td>
                        <td>{{$services->name}}</td>
                        <td>
                            <img style="width:55%;" class="img-responsive" src="{{ asset('Image/Service') }}/{{ $services->image }}">
                            
                        </td>
                        <td>{{$services->price}}</td>
                        <td>{{$services->capacity}}</td>
                        <td>{!! str_limit($services->description, 20) !!}</td>
                        <td>{!! str_limit($services->terms_condition, 20) !!}</td>
                        <td>
                            @if($services->status == 1)
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

