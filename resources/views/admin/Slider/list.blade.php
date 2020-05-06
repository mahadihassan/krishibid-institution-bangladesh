@extends('layouts.backend')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Slider List</h3>
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
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Published</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($slider as $key => $sliders)
                    <tr>
                        <td class="col-sm-2">
                        @can('slider.delete', Auth::user())
                            <form action="{{route('admin.Slider.destroy', $sliders->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger fa fa-trash my-5" onclick="return confirm('Are you sure?')"  type="submit"></button>
                        @endcan
                        @can('slider.update', Auth::user())
                                <a href="{{route('admin.Slider.edit', $sliders->id)}}" class="btn btn-info fa fa-edit"></a>
                        @endcan
                            </form>
                        </td>
                        <td>{{++$key}}</td>
                        <td>{{$sliders->title}}</td>
                        <td>
                            <img style="width:40%;" class="img-responsive" src="{{ asset('Image/Slider') }}/{{ $sliders->image }}">
                            
                        </td>
                        <td>{{str_limit($sliders->description,60) }}</td>
                        <td>
                            @if($sliders->status == 1)
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

