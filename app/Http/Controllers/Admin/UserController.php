<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Mail;
use \App\Mail\UserMail;
use Illuminate\Support\Facades\Hash;
use App\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        $this->authorize('users.view', User::class);
        $user = User::orderBy('id', 'DESC')->get();
        $role = Role::all();
        return view('admin.User.list', compact('user','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('users.create', User::class);
        $role = Role::all();
        return view('admin.User.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('users.create', User::class);
        $role = [
            'name'=> 'required',
            'email' => ['required','unique:users'],
            'phone' => 'required',
            'roles' => 'required',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
        $customMessages = [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'phone.required' => 'Phone field is required',
        ];
        $this->validate($request,$role, $customMessages);
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->kib_number = $request->input('kib_number');
        //$user->user_role =implode(',', $request->input('roles'));
        $user->user_role = $request->input('roles');
        $password = $request->input('password');
        $user->password =Hash::make($password); 
        $user->save();

        $usersrole = DB::table('user_role')->insert([
            'user_id' => $user->id,
            'role_id' => $user->user_role,
        ]);
        session()->flash('message', 'User Create Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/User');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('users.update', User::class);
        $role = Role::all();
        $userData = User::find($id);
        return view('admin.User.edit', compact('userData', 'role'));
    }


    public function StatusEdit(Request $request,$id)
    {
        $this->authorize('users.update', User::class);
        $user = User::find($id);
        if($user->status == 1)
        {
            $user->status = 0;
            $user->save();
        }
        else{
            $user->status =1;
            $user->save();
        }
        return back();
        //return view('admin.User.published', compact('user'));
    }


   /* public function StatusUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->status = $request->input('status');
        $user->save();
        session()->flash('message', 'User Update Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/User');
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('users.update', User::class);
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
        $user->kib_number = $request->input('kib_number');
        $user->user_role = $request->input('role');
        $password = $request->input('password');
        $user->password =Hash::make($password); 
        $user->save();
        session()->flash('message', 'User Update Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/User');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('users.delete', User::class);
        $user = User::find($id);
        $user->delete();
        session()->flash('message', 'User Delete Successfully.');
        session()->flash('type', 'success');
        return back();
    }
}
