@extends('layouts.backend')
@section('content')

    <div class="box">
        <div class="box-header" style="text-align: center">
            <h3 class="box-title">Pages List</h3>
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
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Published</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $key => $page)
                    <tr>
                        <td class="col-sm-2">
                            <form action="{{route('admin.Pages.destroy', $page->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger fa fa-trash my-5" onclick="return confirm('Are you sure?')"  type="submit"></button>
                                <a href="{{route('admin.Pages.edit', $page->id)}}" class="btn btn-info fa fa-edit"></a>
                            </form>
                        </td>
                        <td>{{++$key}}</td>
                        <td>{{$page->title}}</td>
                        <td>{!! str_limit($page->description, 50) !!}</td>
                        <td>{{$page->slug}}</td>
                        <td>
                            <img style="width:20%;" class="img-responsive" src="{{ asset('Image/Pages') }}/{{ $page->image }}">
                            
                        </td>
                        <td>
                            @if($page->status == 1)
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

