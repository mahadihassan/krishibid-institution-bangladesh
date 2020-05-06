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
                    <th>User Name</th>
                    <th>Booking Id</th>
                    <th>Total Amount</th>
                    <th>Due Amount</th>
                    <th>Payment Mode</th>
                    <th>Payment Date</th>
                    <th>Published</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payment as $key=> $payments)
                    <tr>
                        <td>
                            <form action="{{route('admin.Payment.destroy', $payments->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger alert-danger fa fa-trash" onclick="return confirm('Are you sure?')"  type="submit"></button>
                            
                            </form>
                        </td>
                        <td>{{++$key}}</td>
                        
                        <td>{{$payments->User->name}}</td>
                        <td>{{$payments->booking_id}}</td>
                        <td>{{$payments->total_amount}}</td>
                        <td>{{$payments->due}}</td>
                        <td>{{$payments->payment_modes_id}}</td>
                        <td>{{$payments->payment_date}}</td>
                        <td>
                            @if($payments->status == 1)
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

