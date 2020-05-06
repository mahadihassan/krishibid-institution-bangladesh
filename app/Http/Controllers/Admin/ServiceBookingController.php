<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceBooking;
use App\Service;
use App\Event;
use App\ServiceType;
use App\User;
use App\Setting;
use App\Payment;
use App\PaymentMode;
use App\ServiceConfigure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use \App\Mail\PaymentMail;
use \App\Mail\BookingCancelMail;
use \App\Mail\BookingReminderMail;
use Carbon\Carbon;
use PDF;

class ServiceBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('servicebooking.view', ServiceBooking::class);
        $servicebooking = ServiceBooking::all();
        $setting = Setting::find(1)->first();
        $booking = ServiceBooking::where('status', 0)->get();
        $bookingemail = ServiceBooking::where('status', 1)->get();
        foreach($bookingemail as $bookingemails)
        {
            if($bookingemails->after == 0)
            {
                $userName = $bookingemails->User->name;
                $userEmail = $bookingemails->User->email;
                $servicename = $bookingemails->Service->name;
                $servicecost = $bookingemails->service_cost;
                $carParking = $bookingemails->car_parking;
                $tax = $bookingemails->service_tax + $bookingemails->car_tax;
                $eventDate = $bookingemails->from_date;
                $createDate = $bookingemails->created_at;
                $due = $bookingemails->total_cost;
                $datemail = Carbon::parse($bookingemails->from_date)->subDays(15);
                if($datemail <= date('Y-m-d'))
                {
                    \Mail::to($userEmail)->send(new BookingReminderMail($servicename, $servicecost, $eventDate, $due, $userName, $carParking, $tax, $createDate));
                    $bookingemails->after = 2;
                    $bookingemails->save();
                }
            }
        }
        foreach($booking as $bookings)
        {
            $reminder =$bookings->created_at->addDays(2);
            $userName = $bookings->User->name;
            $userEmail = $bookings->User->email;
            $servicename = $bookings->Service->name;
            $servicecost = $bookings->service_cost;
            $carParking = $bookings->car_parking;
            $tax = $bookings->service_tax + $bookings->car_tax;
            $eventDate = $bookings->from_date;
            $createDate = $bookings->created_at;
            $due = $bookings->total_cost;
            if($bookings->reminder == 0)
            {
                if($reminder <= date('Y-m-d'))
                {
                    \Mail::to($userEmail)->send(new BookingReminderMail($servicename, $servicecost, $eventDate, $due, $userName, $carParking, $tax, $createDate));
                    \Mail::to($setting->admin_email)->send(new BookingReminderMail($servicename, $servicecost, $eventDate, $due, $userName, $carParking, $tax, $createDate));
                    $bookings->reminder = 1;
                    $bookings->save();
                }
            }
            $date = $bookings->created_at->addDays(3);
            if($date < date('Y-m-d'))
            {
                \Mail::to($userEmail)->send(new BookingCancelMail($servicename, $eventDate, $due, $userName));
                \Mail::to($setting->admin_email)->send(new BookingCancelMail($servicename, $eventDate, $due, $userName));
                $bookings->status = 2;
                $bookings->save();
                
            }
        }
        return view('admin.Booking.list', compact('booking', 'service', 'servicebooking')); 
    }

    
    public function show($id)
    {
        $this->authorize('servicebooking.view', ServiceBooking::class);
        $showbooking = ServiceBooking::find($id);
        return view('admin.Booking.show', compact('showbooking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

/*
    public function ServiceName(Request $request)
    {
        $states = Service::select('name','id')->where("service_types_id",$request->service_type_id)
        ->get();
        return response()->json($states);
    }

    public function ServiceCost(Request $request)
    {
        $states = Service::select('id','price')->where("id",$request->services_id)
        ->get();
        return response()->json($states);
    }


    public function ServiceConfigureBooking(Request $request)
    {
        $states = ServiceConfigure::select('check_in','id','check_out')->where("services_id",$request->services_id)
        ->get();
        return response()->json($states);
    }
    */


    public function edit($id)
    {
        $this->authorize('servicebooking.update', ServiceBooking::class);
        $servicebooking = ServiceBooking::find($id);
        return view('admin.Booking.edit', compact('servicetype', 'servicebooking', 'event'));
    }


    public function Published($id)
    {
        $this->authorize('servicebooking.view', ServiceBooking::class);
        $servicebooking = ServiceBooking::find($id);
        return view('admin.Booking.published', compact('servicebooking'));
    }


    public function PublishedUpdate(Request $request, $id)
    {
        $this->authorize('servicebooking.view', ServiceBooking::class);
        $publishedbooking = ServiceBooking::find($id);
        $publishedbooking->status = $request->input('status');
       // dd($publishedbooking);
        $publishedbooking->save();
        session()->flash('message', 'Booking Update Successfully');
        session()->flash('type', 'success');
        return redirect('admin/Booking');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('servicebooking.update', ServiceBooking::class);
        $rules = [
            'fdate' => 'required',
            'tdate' => 'required',
        ];
        $customMessages = [
            'fdate.required' => 'Date field is required',
            'tdate.required' => 'Date To field is required',
        ];
        $this->validate($request,$rules, $customMessages);
        $date = ServiceBooking::where('from_date', '<=',  $request->tdate)->where('to_date', '>=', $request->fdate)->where('services_id', $request->services_id)->first();
        if($date)
        {
            session()->flash('messages', 'There is No Available Slot in that Date . Please Check Our Others Services');
            return back();
        }
        else{
            $servicebooking = ServiceBooking::find($id);
            $servicebooking->from_date = $request->input('fdate');
            $servicebooking->to_date = $request->input('tdate');
            $servicebooking->status = $request->input('status');
            $servicebooking->save();
            session()->flash('message', 'Your Booking Updated Successfully.');
            session()->flash('type', 'success');
            return redirect('admin/Booking');
        }
    }


    public function Payment($id)
    {
        $paymentmode = PaymentMode::all();
        $servicebooking = ServiceBooking::find($id);
        $payment1 = Payment::where('service_bookings_id', $id)->first();
        $payment2 = Payment::where('service_bookings_id', $id)->groupBy('service_bookings_id')->sum('total_amount');
        $data = $payment1->due - $payment2;
        $total_payment = $payment2;
        $payment = Payment::where('service_bookings_id', $id)->whereNotNull('payment_modes_id')->get();
        $bookingId= Payment::where('service_bookings_id', $id)->whereNotNull('booking_id')->first();
        return view('admin.Booking.payment', compact('servicebooking', 'paymentmode', 'data', 'payment', 'bookingId' , 'total_payment'));
        
    }

    public function PaymentUpdate(Request $request, $id)
    {
        $role = [
            'paymentmode'=> 'required',
            'amount' => 'required',
            'payment_date' => 'required',
        ];

        $customMessages = [
            'paymentmode.required' => 'Payment Mode field is required',
            'amount.required' => 'Amount field is required',
            'payment_date.required' => 'Payment Date field is required',
        ];

        $this->validate($request,$role, $customMessages);
        $servicebooking = ServiceBooking::find($id);
        $servicebooking->save();
        $payments = new  Payment;
        $payments->users_id = $servicebooking->users_id;
        $payments->service_bookings_id = $servicebooking->id;
        $payments->total_amount = $request->input('amount');
        $payments->due = $request->input('after_payment');
        $payments->payment_modes_id = $request->input('paymentmode');
        $payments->payment_date = $request->input('payment_date');
        $payments->save();
        $name = $request->input('name');
        $service = $request->input('service');
        $booking_id = $request->input('booking_id');
        $unit_cost = $request->input('unit_cost');
        $vat = $request->input('tax1') + $request->input('tax2');
        \Mail::to($request->email)->send(new PaymentMail($payments, $name, $service, $booking_id, $unit_cost, $vat));
        session()->flash('message', 'Payment Submit Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Booking');
    }

    public function PaymentLog($id)
    {
        $servicebooking = ServiceBooking::find($id);
        $payment1 = Payment::where('service_bookings_id', $id)->first();
        $payment2 = Payment::where('service_bookings_id', $id)->groupBy('service_bookings_id')->sum('total_amount');
        $data = $payment1->due - $payment2;
        $total_payment = $payment2;
        $bookingId= Payment::where('service_bookings_id', $id)->whereNotNull('booking_id')->first();
        $payment = Payment::where('service_bookings_id', $id)->whereNotNull('payment_modes_id')->get();
        return view('admin.Booking.payment_log', compact('servicebooking', 'data', 'total_payment', 'bookingId', 'payment', 'total_payment'));
    }

    public function LodePDF($id)
    {
        $servicebooking = ServiceBooking::find($id);
        $payment1 = Payment::where('service_bookings_id', $id)->first();
        $payment2 = Payment::where('service_bookings_id', $id)->groupBy('service_bookings_id')->sum('total_amount');
        $data = $payment1->due - $payment2;
        $total_payment = $payment2;
        $bookingId= Payment::where('service_bookings_id', $id)->whereNotNull('booking_id')->first();
        $payment = Payment::where('service_bookings_id', $id)->whereNotNull('payment_modes_id')->get();  
       // dd($servicebooking);
        $pdf = PDF::loadView('admin.Booking.payment_pdf', compact('data', 'total_payment', 'bookingId', 'payment', 'servicebooking'));
        return $pdf->download('payment_pdf.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('servicebooking.delete', ServiceBooking::class);
        $ServiceBooking= ServiceBooking::find($id);
        $ServiceBooking->delete();
        session()->flash('message', 'Booking Delete Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Booking');
    }



    public function Report(Request $request)
    {

        $service = Service::all();
        $servicetype = ServiceType::all();
        $event = Event::all();
        $booking = ServiceBooking::all();
        $user = User::all();
        return view('admin.Report.booking_list', compact('booking', 'service', 'servicetype', 'event', 'user')); 

    }


    public function Reportlist(Request $request)
    {
        $service = Service::all();
        $servicetype = ServiceType::all();
        $event = Event::all();
        $user = User::all();
        $filters = [
            'users_id' => $request->input('users_id'),
            'servicetypes' => $request->input('servicetypes'),
            'services' => $request->input('services'),
            'events' => $request->input('events'),
            'status' => $request->input('status'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'created_at' => $request->input('created_at'),
        ];
        $booking = ServiceBooking::where(function ($query) use ($filters) {
            if ($filters['users_id']) {
                $data= $query->where('users_id', $filters['users_id']);
            }
            if ($filters['servicetypes']) {
                $query->where('service_types_id', '=', $filters['servicetypes']);
            }
            if ($filters['services']) {
                $query->where('services_id', '=', $filters['services']);
            }
            if ($filters['events']) {
                $query->where('events_id', '=', $filters['events']);
            }
            if ($filters['status']) {
                $query->where('status', '=', $filters['status']);
            }
            if ($filters['from']) {
                $query->where('from_date', '=', $filters['from']);
            }
            if ($filters['to']) {
                $query->where('to_date', '=', $filters['to']);
            }
            if($filters['created_at']) {
                $query->where('created_at', '=', $filters['created_at']);
            }
        })->get();
        return view('admin.Report.booking_list', compact('booking', 'service', 'servicetype', 'event', 'user')); 
        
    }
     
}
