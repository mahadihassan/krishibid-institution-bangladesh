
@extends('layouts.backend')
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary ">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">User Create</h3>
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
                    <form role="form" method="post" action="{{route('admin.User.store')}}">
                       @csrf
                        @method('POST')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Name <font color="red">*</font> </label>
                                <input type="text" class="form-control" name="name" value="">
                            </div>

                            <div class="form-group">
                                <label for="">Email <font color="red">*</font></label>
                                <input type="text" class="form-control" name="email" value="">
                            </div>

                            <div class="form-group">
                                <label for="">Phone Number <font color="red">*</font></label>
                                <input type="text" class="form-control" name="phone" value="">
                            </div>

                            <div class="form-group">
                                <label for="kib">Are You A KIB Member?</label>
                                    <br>
                                        <label for="check1">Yes</label>
                                        <input type="checkbox" id="check1" onclick="myFunction(this.id)">
                                        <label for="check2">No</label>
                                        <input type="checkbox" id="check2"  onclick="myFunction(this.id)">
                                        <input type="text" id="kib" name="kib_number" class="form-control my-3" style="display: none;" placeholder="Enter Your KIB Code Number">
                            </div>

                            {{--<div class="form-group">
                                <label for="role">Role</label>
                                    <select class="form-control form-control-lg selectpicker" id="data" name="roles[]" multiple>
                                        @foreach($role as $value)
                                            <option value="{{$value->id}}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>--}}

                            <div class="form-group">
                                <label for="status">Role</label>
                                <select class="form-control" name="roles">
                                    <option value="" >Please Select User Role</option>
                                        @foreach($role as $value)
                                            <option value="{{$value->id}}">{{ $value->name }}</option>
                                        @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Password <font color="red">*</font></label>
                                <input type="password" class="form-control" name="password" value="">
                            </div>

                            <div class="form-group">
                                <label for="">Confirm Password <font color="red">*</font></label>
                                <input type="password" class="form-control" name="password_confirmation">
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $('#data').selectpicker();
</script>


<script type="text/javascript">
    function myFunction(id) {
        for (var i = 1;i <= 2; i++)
        {
            document.getElementById("check" + i).checked = false;
        }
        document.getElementById(id).checked = true;
        var checkBox1 = document.getElementById("check1");
        var checkBox2 = document.getElementById("check2");
        var value1 = document.getElementById("kib");
        if (checkBox1.checked == true){
           value1.style.display = "block";
        }
        else if (checkBox2.checked == true) {
          value1.style.display = "none";
        }
        else {
            value1.style.display = "none";
        }
    }
</script>
@endsection

