<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserDashboardController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }
    
    public function Dashboard()
    {
    	$user = Auth::user();
    	$userbooking = ServiceBooking::where('users_id', $user->id)->get();
        $booking = ServiceBooking::where('status', 0)->get();
        foreach($booking as $bookings)
        {
            $date = $bookings->created_at->addDays(3);
            if($date < date('Y-m-d'))
            {
                $bookings->status = 2;
                $bookings->save();
            }
        }
        return view('Frontend.User.dashboard', compact('userbooking'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('Frontend.User.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $role = [
            'name'=> 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
        $customMessages = [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'phone.required' => 'Phone field is required',
        ];
        $this->validate($request,$role, $customMessages);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('message', 'User Update Successfully.');
        session()->flash('type', 'success');
        return redirect('user/dashboard');

    }
}
