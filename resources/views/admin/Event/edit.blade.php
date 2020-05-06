@extends('layouts.backend')
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary ">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Event Type Edit</h3>
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
                    <form role="form" method="post" action="{{route('admin.Event.update', $events->id)}}" enctype="multipart/form-data">
                       @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Name *</label>
                                <input type="text" class="form-control" name="name" value="{{$events->name}}">
                            </div>


                            <div class="form-group">
                                <label for="">Description *</label>
                                <textarea rows="3" class="form-control" name="description">{!! $events->description !!}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    @switch($events->status)
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
