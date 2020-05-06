<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Intervention\Image\Facades\Image;
use App\User;
use App\Service;
use App\ServiceBooking;
use App\Contact;

class HomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');

    }
    
    public function index()
    {
        $user = User::count();
        $service = Service::count();
        $ServiceBooking = ServiceBooking::count();
    	return view('admin.home', compact('user', 'ServiceBooking', 'service'));
    }
    public function Setting()
    {
    	$setting = Setting::find(1)->first();
    	return view('admin.setting', compact('setting'));
    }

    public function SettingStore(Request $request)
    {
    	$role = [
            'title'=> 'required',
            'site_slowgaan' => 'required',
            'email' => 'required',
            'contact_map' => 'required',
            'address' => 'required',
            'copyright' => 'required',
        ];
        $customMessages = [
            'title.required' => 'Web Site Title field is required',
            'site_slowgaan.required' => 'Web Site Slow Gaan field is required',
            'email.required' => 'Admin Email field is required',
            'contact_map.required' => 'Contact Map field is required',
            'address.required' => 'Address field is required',
            'copyright.required' => 'Copy Right field is required',
        
        ];
        $this->validate($request,$role, $customMessages);
        $setting = Setting::find(1);
        $setting->site_title = $request->input('title');
        $setting->site_slowgaan = $request->input('site_slowgaan');
        $setting->admin_email = $request->input('email');
        $setting->phone = $request->input('phone');
        $setting->contact_map = $request->input('contact_map');
        $setting->address = $request->input('address');
        $setting->copyright = $request->input('copyright');
        $setting->meta_type = $request->input('meta_type');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = "frontend/image/$filename";
            Image::make($image)->save($location);
            $setting->logo = $filename;
        }
        $setting->save();
        session()->flash('message', 'Web Setting Update Successfully.');
        session()->flash('type', 'success');
        return back();
    }

    public function Contact()
    {
        $contact = Contact::all();
        return view('admin.contact', compact('contact'));
    }

    public function ContactDelete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        session()->flash('message', 'Contact Message Delete Successfully.');
        session()->flash('type', 'success');
        return back();

    }

}
