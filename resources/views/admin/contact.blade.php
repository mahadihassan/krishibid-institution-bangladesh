@extends('layouts.backend')
@section('content')

    <div class="box">
        <div class="box-header" style="text-align: center">
            <h3 class="box-title">Service Type List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($contact as $key => $contacts)
                    <tr>
                        <td>
                            <form action="{{route('admin.Contact-Delete', $contacts->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger fa fa-trash my-5" onclick="return confirm('Are you sure?')"  type="submit"></button>
                            </form>
                        </td>
                        <td>{{++$key}}</td>
                        <td>{{$contacts->fname}}</td>
                        <td>{{$contacts->email}}</td>
                        <td>{{$contacts->message}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

