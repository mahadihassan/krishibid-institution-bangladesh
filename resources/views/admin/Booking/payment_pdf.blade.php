<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8" >
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h4 class="box-title">Payment Log</h4>
                    </div>
                    <!-- /.box-header -->
                <ul class="list-group">
                  <li class="">User Name
                    <span class="badge badge-primary badge-pill">{{$servicebooking->User->name}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">User Email
                    <span class="badge badge-primary badge-pill">{{$servicebooking->User->email}}</span>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center">Booking Id Number
                    <span class="badge badge-danger badge-pill">{{$bookingId->booking_id}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Service Name
                    <span class="badge badge-danger badge-pill">{{$servicebooking->Service->name}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Event Type
                    <span class="badge badge-danger badge-pill">{{$servicebooking->Event->name}}</span>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center">Event Date
                    <span class="badge badge-danger badge-pill">{{$servicebooking->from_date}}</span>
                  </li>
                  <h4 class="text-center">Payment History</h4>
                    @foreach($payment as $payments)
                        <li class="list-group-item d-flex justify-content-between align-items-center">{{$payments->payment_modes_id}}
                            <span class="badge badge-danger badge-pill">{{$payments->total_amount}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Payment Date
                            <span class="badge badge-danger badge-pill">{{$payments->payment_date}}</span>
                        </li>
                    @endforeach
                    <hr>
                  
                    <li class="list-group-item d-flex justify-content-between align-items-center">Total Payment Amount
                    <span class="badge badge-danger badge-pill">{{$total_payment}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">Total Due Amount
                    <span class="badge badge-danger badge-pill">{{$data}}</span>
                  </li>
                </ul>
                </div>
            </div>
        </div>
    </section>
  </body>

  </html>
