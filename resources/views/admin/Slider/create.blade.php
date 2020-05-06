@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Slider
            <small>Enter Slider Info here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Slider</li>
        </ol>
    </section>

    <br>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Slider Create</h3>
                      @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admin.Slider.store')}}" enctype="multipart/form-data">
                       @csrf
                        @method('POST')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Title <font color="red">*</font></label>
                                <input type="text" class="form-control" name="title"  placeholder="Enter Your Slider Name">
                            </div>

                             <div class="form-group">
                                <label for="exampleFormControlFile1">File input <font color="red">*</font></label>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            </div>

                            <div class="form-group">
                                <label for="">Description </label>
                                <textarea rows="3" class="form-control" name="description" placeholder="Enter Slider Description"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option  value="1" selected="">Yes</option>
                                    <option  value="0">No</option>
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
