@extends('layouts.backend')
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary ">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">User Published Edit</h3>
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
                    <form role="form" method="post" action="{{route('admin.StatusUpdate', $user->id)}}">
                       @csrf
                        @method('POST')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="status">Published</label>
                                <select class="form-control" name="status">
                                    @switch($user->status)
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
