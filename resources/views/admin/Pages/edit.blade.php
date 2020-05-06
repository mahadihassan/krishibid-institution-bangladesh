@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Public View
            <small>Enter Pages Info here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Public View Pages</li>
        </ol>
    </section>

    <br>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Page Edit</h3>
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
                    <form role="form" method="post" action="{{route('admin.Pages.update', $pages->id)}}" enctype="multipart/form-data">
                       @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Title *</label>
                                <input type="text" class="form-control" name="title" value="{{$pages->title}}">
                            </div>

                            <div class="form-group">
                                <label for="">Slug *</label>
                                <input type="text" class="form-control" name="slug" value="{{$pages->slug}}">
                            </div>

                            <div class="form-group">
                                <label for="">Description *</label>
                                <textarea rows="3" class="form-control" name="description">
                                    {!! $pages->description !!}
                                </textarea>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlFile1">File input</label>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                @if($pages->status == 1)
                                    <option  value="1" selected="">Yes</option>
                                    <option  value="0">No</option>
                                @else
                                    <option  value="1">Yes</option>
                                    <option  value="0" selected>No</option>
                                @endif
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


<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection
