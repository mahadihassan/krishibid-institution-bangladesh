<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceType;
use Illuminate\Support\Facades\Auth;

class ServiceTypeController extends Controller
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
        $this->authorize('servicetype.view', ServiceType::class);
        $serviceType = ServiceType::orderBy('id', 'DESC')->get();
        return view('admin.ServiceType.list', compact('serviceType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('servicetype.create', ServiceType::class);
        return view('admin.ServiceType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('servicetype.create', ServiceType::class);
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $user = Auth::user();
        $serviceType = new ServiceType;
        $serviceType->name = $request->input('name');
        $serviceType->description = $request->input('description');
        if($file = $request->file('image'))
        {
            $name = rand().$file->getClientOriginalName();
            $file->move(public_path('Image/ServiceType'), $name);
            $serviceType->image = $name;
        }
        $serviceType->status = $request->input('status');
        $serviceType->created_by = $user->id;
        $serviceType->save();
        session()->flash('message', 'ServiceType Create Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/ServiceType');

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
        $this->authorize('servicetype.update', ServiceType::class);
        $serviceType =ServiceType::find($id);
        return view('admin.ServiceType.edit', compact('serviceType'));
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
        $this->authorize('servicetype.update', ServiceType::class);
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $user = Auth::user();
        $serviceType =ServiceType::find($id);
        $serviceType->name = $request->input('name');
        if($file = $request->file('image')){
            $name = "";
            $album = $serviceType->image;
            $filename = public_path() . '/Image/ServiceType/' . $album;
            \File::delete($filename);
            $name = rand().$file->getClientOriginalName();
            $file->move(public_path('Image/ServiceType'), $name);
            $serviceType->image = $name;
        }
        $serviceType->description = $request->input('description');
        $serviceType->status = $request->input('status');
        $serviceType->updated_by = $user->id;
        $serviceType->save();
        session()->flash('message', 'ServiceType Update Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/ServiceType');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('servicetype.delete', ServiceType::class);
        $serviceType=ServiceType::find($id);
        $file = $serviceType->image;
        $filename = public_path() . '/Image/ServiceType/' . $file;
        \File::delete($filename);
        $serviceType->delete();
        session()->flash('message', 'ServiceType Delete Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/ServiceType');

    }
}
