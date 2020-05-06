@extends('layouts.backend')
@section('content')

 <section class="content-header">
        <h1>
            Service Type
            <small>Enter Service Type Info here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Service Type</li>
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
                        <h3 class="box-title">ServiceType Create</h3>
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
                    <form role="form" method="post" action="{{route('admin.ServiceType.store')}}" enctype="multipart/form-data">
                       @csrf
                        @method('POST')
                        <div class="box-body">
                            <div class="form-group">
                                <label for=""> Name *</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter Your ServiceType Name">
                            </div>


                             <div class="form-group">
                                <label for="exampleFormControlFile1">File input *</label>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            </div>
                            
                            <div class="form-group">
                                <label for=""> Description *</label>
                                <textarea rows="3" class="form-control" name="description" placeholder="Enter ServiceType Description"></textarea>
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

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description');
</script>
@endsection
