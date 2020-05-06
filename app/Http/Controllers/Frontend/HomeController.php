<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceType;
use App\ServiceConfigure;
use App\Contact;
use App\Setting;
use App\ServiceBooking;
use Mail;
use \App\Mail\BookingCancelMail;
use \App\Mail\BookingReminderMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $homeService = ServiceType::where('status', 1)->get();
    	return view('Frontend.home', compact('homeService'));
    }

    public function about()
    {
    	return view('Frontend.kib_about_complex');
    }
    public function contact()
    {
    	return view('Frontend.contact');
    }

    public function ContactStore(Request $request)
    {
        $role = [
            'fname'=> 'required',
            'email' => 'required',
        ];
        $customMessages = [
            'fname.required' => 'First Name field is required',
            'email.required' => 'Email field is required',
        ];
        $this->validate($request,$role, $customMessages);
        $contact = new Contact;
        $contact->fname = $request->input('fname');
        $contact->lname = $request->input('lname');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->save();
        session()->flash('message', 'Your Contact Message Submitted Successfully');
        session()->flash('type', 'success');
        return back();
    }

    public function kib_about_complex()
    {
        return view('Frontend.about_us');
    }

    public function Service($id)
    {
        $service = Service::where('service_types_id', $id)->where('status', 1)->get();
        return view('Frontend.service', compact('service'));
    }


    public function BookingCancel(Request $request, $id)
    {
        $user = Auth::user();
        $bookingstatus = ServiceBooking::find($id);
        $bookingstatus->status = 2;
        $bookingstatus->updated_by = $user->id;
        $bookingstatus->save();
        return back();
    }

    public function ServiceBookingList()
    {
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
        return ('Hello World'); 
    }
    
}
