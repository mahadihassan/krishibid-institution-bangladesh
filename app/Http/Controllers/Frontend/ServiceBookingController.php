<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Service;
use App\ServiceConfigure;
use App\ServiceBooking;
use App\Event;
use App\User;
use Mail;
use \App\Mail\SendMail;
use \App\Mail\AdminMail;
use App\Payment;
use App\Setting;

class ServiceBookingController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function ServiceBooking($id)
    {
        $event = Event::all();
        $services = Service::find($id);
        $service_configs = ServiceConfigure::where('services_id', $id)->get();
        return view('Frontend.service_booking', compact('services','service_configs', 'event'));
    }
    public function store(Request $request)
    {
    	$rules = [
            'guest' => 'required',
            'fdate' => 'required',
            'tdate' => 'required',
            'service_config_id' => 'required',
        ];
        $customMessages = [
            'guest.required' => 'Number of Guest field is required',
            'service_config_id.required' => 'Time slot field is required',
            'fdate.required' => 'Date field is required',
            'tdate.required' => 'Date To field is required',
        ];
        $this->validate($request,$rules, $customMessages);
        $setting = Setting::find(1)->first();
        $date = ServiceBooking::where('from_date', '<=',  $request->tdate)->where('to_date', '>=', $request->fdate)->where('services_id', $request->services_id)->first();
        $room1 = Service::where('id', $request->services_id)->pluck('room')->first();
        $room2 = ServiceBooking::where('services_id', $request->services_id)->groupBy('services_id')->sum('room');
        $room3 = ($room1 - ($room2+$request->room));
        if($date)
        {
            if(empty($room1))
            {
                session()->flash('messages', 'There is No Available Slot in that Date . Please Check Our Others Services');
                return back();
            }
            elseif($room3 >= 0){
                $user = Auth::user();
                $service_booking = new ServiceBooking;
                $service_booking->users_id = $request->input('user_id');
                $service_booking->service_types_id = $request->input('service_types_id');
                //dd($service_booking->service_types_id);
                $service_booking->services_id = $request->input('services_id');
                $service_booking->service_configures_id = $request->input('service_config_id');
                $service_booking->events_id = $request->input('event_type');
                $service_booking->kib_number = $request->input('kib_number');
                $service_booking->room = $request->input('room');
                if(empty($user->kib_number))
                {
                    if($request->kib_number)
                    {
                        $user->kib_number = $request->input('kib_number');
                        $service_booking->kib_number = $request->input('kib_number');
                        $user->save();
                        switch ($service_booking->services_id) {
                            case '1':
                                $service_booking->service_cost = 1500;
                                $service_booking->discount = 2000;
                                $service_booking->service_tax = ((1500 * 15) / 100); 
                                break;
                            case '2':
                                $service_booking->service_cost = 500;
                                $service_booking->discount = 1500;
                                 $service_booking->service_tax = ((500 * 15) / 100);  
                                break;
                            case '3':
                                $service_booking->service_cost = 500; 
                                $service_booking->discount = 1500;
                                $service_booking->service_tax = ((500 * 15) / 100); 
                                break;
                            case '4':
                                $service_booking->service_cost = 500;
                                $service_booking->discount = 1500;
                                $service_booking->service_tax = ((500 * 15) / 100); 
                                break;
                            case '5':
                                $service_booking->service_cost = 20000; 
                                $service_booking->discount = 55000;
                                 $service_booking->service_tax = ((20000 * 15) / 100); 
                                break;
                            case '6':
                                $service_booking->service_cost = 40000; 
                                $service_booking->discount = 75000;
                                $service_booking->service_tax = ((40000 * 15) / 100); 
                                break;
                            default:
                                $service_booking->service_cost = $request->input('services_price');
                                break;
                        }
                    }
                    else{
                        $service_booking->service_cost = $request->input('services_price');
                        $service_booking->service_tax = (($request->services_price * 15) / 100); 
                        $service_booking->users_id = $request->input('user_id');
                    }
                }
                elseif($user->kib_number == $request->kib_number)
                {
                    switch ($service_booking->services_id) {
                        case '1':
                            $service_booking->service_cost = 1500;
                            $service_booking->discount = 2000; 
                            $service_booking->service_tax = ((1500 * 15) / 100); 
                            break;
                        case '2':
                            $service_booking->service_cost = 500;
                            $service_booking->discount = 1500;
                            $service_booking->service_tax = ((500 * 15) / 100);  
                            break;
                        case '3':
                            $service_booking->service_cost = 500;
                            $service_booking->discount = 1500;
                            $service_booking->service_tax = ((500 * 15) / 100);   
                            break;
                        case '4':
                            $service_booking->service_cost = 500;
                            $service_booking->discount = 1500;
                            $service_booking->service_tax = ((500 * 15) / 100);   
                            break;
                        case '5':
                            $service_booking->service_cost = 20000;
                            $service_booking->discount = 55000; 
                            $service_booking->service_tax = ((20000 * 15) / 100);  
                            break;
                        case '6':
                            $service_booking->service_cost = 40000;
                            $service_booking->discount = 75000; 
                            $service_booking->service_tax = ((40000 * 15) / 100);  
                            break;
                        default:
                            $service_booking->service_cost = $request->input('services_price');
                            $service_booking->service_tax = (($request->services_price * 15) / 100);
                            break;
                    }
                }
                else
                {
                    $service_booking->service_cost = $request->input('services_price');
                    $service_booking->service_tax = (($request->services_price * 15) / 100);
                }
                if(($request->service_types_id == 2) || ($request->service_types_id == 4) || ($request->service_types_id ==5) )
                {
                    $service_booking->car_parking = 3000;
                    $service_booking->car_tax = ((3000 * 15) / 100);
                }
                else{
                    $service_booking->car_parking =0;
                }
                $service_booking->total_cost = $service_booking->service_cost + $service_booking->car_parking + $service_booking->service_tax + $service_booking->car_tax;
                $service_booking->guest_number = $request->input('guest');
                $service_booking->from_date = $request->input('fdate');
                $service_booking->to_date = $request->input('tdate');
                $service_booking->notes = $request->input('note');
                $service_booking->save();
                $payment = new Payment;
                $payment->booking_id =(('KIBC'.date("Y")).$service_booking->id);
                $payment->service_bookings_id = $service_booking->id;
                $payment->users_id = $service_booking->users_id;
                $payment->due = $service_booking->total_cost;
                $payment->save();
                //Email Variable
                $name = $user->name;
                $serviceName = Service::where('id', $request->services_id)->pluck('name')->first();
                $eventDate = $request->input('fdate');
                $createDate = date("Y-m-d");
                $servicePrice = $service_booking->service_cost;
                $tax = $service_booking->service_tax + $service_booking->car_tax;
                $totalAmount = $service_booking->total_cost;
                $due = $payment->due;
                \Mail::to($user->email)->send(new SendMail($name, $serviceName, $eventDate, $createDate, $servicePrice, $tax, $totalAmount, $due));
                \Mail::to($setting->admin_email)->send(new AdminMail($name, $serviceName, $eventDate, $createDate, $servicePrice, $tax, $totalAmount, $due, $car_parking));
                session()->flash('message', 'Your Booking Submitted Successfully! Please Check Confirmation Mail');
                session()->flash('type', 'success');
                return back();
            }
            else{
                session()->flash('messages', 'There is No Available Slot in that Date . Please Check Our Others Services');
                return back();
            }
        }

        //Main If Else Part.
        else
        {
            $user = Auth::user();
            $service_booking = new ServiceBooking;
            $service_booking->users_id = $request->input('user_id');
            $service_booking->service_types_id = $request->input('service_types_id');
            $service_booking->services_id = $request->input('services_id');
            $service_booking->service_configures_id = $request->input('service_config_id');
            $service_booking->events_id = $request->input('event_type');
            $service_booking->room = $request->input('room');
            if(empty($user->kib_number))
            {
                if($request->kib_number)
                {
                    $user->kib_number = $request->input('kib_number');
                    $service_booking->kib_number = $request->input('kib_number');
                    $user->save();
                    switch ($service_booking->services_id) {
                        case '1':
                            $service_booking->service_cost = 1500;
                            $service_booking->discount = 2000;
                            $service_booking->service_tax = ((1500 * 15) / 100);  
                            break;
                        case '2':
                            $service_booking->service_cost = 500;
                            $service_booking->discount = 1500; 
                            $service_booking->service_tax = ((500 * 15) / 100); 
                            break;
                        case '3':
                            $service_booking->service_cost = 500;
                            $service_booking->discount = 1500;
                            $service_booking->service_tax = ((500 * 15) / 100);   
                            break;
                        case '4':
                            $service_booking->service_cost = 500;
                            $service_booking->discount = 1500;
                            $service_booking->service_tax = ((500 * 15) / 100);   
                            break;
                        case '5':
                            $service_booking->service_cost = 20000;
                            $service_booking->discount = 55000; 
                            $service_booking->service_tax = ((20000 * 15) / 100);  
                            break;
                        case '6':
                            $service_booking->service_cost = 40000;
                            $service_booking->discount = 75000; 
                            $service_booking->service_tax = ((40000 * 15) / 100);  
                            break;
                        default:
                            $service_booking->service_cost = $request->input('services_price');
                            break;
                    }
                }
                else{
                    $service_booking->service_cost = $request->input('services_price');
                    $service_booking->service_tax = (($request->services_price * 15) / 100); 
                }
            }
            elseif($user->kib_number == $request->kib_number)
            {
                switch ($service_booking->services_id) {
                    case '1':
                        $service_booking->service_cost = 1500;
                        $service_booking->discount = 2000; 
                        $service_booking->service_tax = ((1500 * 15) / 100); 
                        break;
                    case '2':
                        $service_booking->service_cost = 500;
                        $service_booking->discount = 1500;
                        $service_booking->service_tax = ((500 * 15) / 100);  
                        break;
                    case '3':
                        $service_booking->service_cost = 500;
                        $service_booking->discount = 1500;
                        $service_booking->service_tax = ((500 * 15) / 100);   
                        break;
                    case '4':
                        $service_booking->service_cost = 500;
                        $service_booking->discount = 1500;
                        $service_booking->service_tax = ((500 * 15) / 100);   
                        break;
                    case '5':
                        $service_booking->service_cost = 20000;
                        $service_booking->discount = 55000; 
                        $service_booking->service_tax = ((20000 * 15) / 100);  
                        break;
                    case '6':
                        $service_booking->service_cost = 40000;
                        $service_booking->discount = 75000; 
                        $service_booking->service_tax = ((40000 * 15) / 100);  
                        break;
                    default:
                        $service_booking->service_cost = $request->input('services_price');
                        $service_booking->service_tax = (($request->services_price * 15) / 100);
                        break;
                }
            }
            else
            {
                $service_booking->service_cost = $request->input('services_price');
                $service_booking->service_tax = (($request->services_price * 15) / 100);
            }
            if(($request->service_types_id == 2) || ($request->service_types_id == 4) || ($request->service_types_id ==5) )
            {
                $service_booking->car_parking = 3000;
                $service_booking->car_tax = ((3000 * 15) / 100);
            }
            else{
                $service_booking->car_parking = 0;
            }
            
            $service_booking->total_cost = $service_booking->service_cost + $service_booking->car_parking + $service_booking->service_tax + $service_booking->car_tax;
            $service_booking->guest_number = $request->input('guest');
            $service_booking->from_date = $request->input('fdate');
            $service_booking->to_date = $request->input('tdate');
            $service_booking->notes = $request->input('note');
            $service_booking->save();
            $payment = new Payment;
            $payment->booking_id =(('KIBC'.date("Y")).$service_booking->id);
            $payment->service_bookings_id = $service_booking->id;
            $payment->users_id = $service_booking->users_id;
            $payment->due = $service_booking->total_cost;
            $payment->save();
            //Email Send Vaiable
            $name = $user->name;
            $serviceName = Service::where('id', $request->services_id)->pluck('name')->first();
            $eventDate = $request->input('fdate');
            $createDate = date("Y-m-d");
            $servicePrice = $service_booking->service_cost;
            $tax = $service_booking->service_tax + $service_booking->car_tax;
            $car_parking = $service_booking->car_parking;
            $totalAmount = $service_booking->total_cost;
            $due = $payment->due;
            \Mail::to($user->email)->send(new SendMail($name, $serviceName, $eventDate, $createDate, $servicePrice, $tax, $totalAmount, $due, $car_parking));
            \Mail::to($setting->admin_email)->send(new AdminMail($name, $serviceName, $eventDate, $createDate, $servicePrice, $tax, $totalAmount, $due, $car_parking));
            session()->flash('message', 'Your Booking Submitted Successfully! Please Check Confirmation Mail');
            session()->flash('type', 'success');
            return back();
        }
    }
}
