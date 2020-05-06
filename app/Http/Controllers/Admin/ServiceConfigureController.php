<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\ServiceType;
use App\Service;
use App\ServiceConfigure;

class ServiceConfigureController extends Controller
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
        $this->authorize('serviceconfigure.view', ServiceConfigure::class);
        $serviceconfig = ServiceConfigure::orderBy('id', 'DESC')->get();
        return view('admin.ServiceConfigure.list', compact('serviceconfig'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('serviceconfigure.create', ServiceConfigure::class);
        $servicetype = ServiceType::all();
        return view('admin.ServiceConfigure.create', compact('servicetype'));
    }


    public function service(Request $request)
    {
        $states = Service::where("service_types_id",$request->service_type_id)
        ->pluck("name","id");
        return response()->json($states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('serviceconfigure.create', ServiceConfigure::class);
        $role = [
            'service_type_id'=> 'required',
            'serverice_id' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'duration' => 'required',
        ];

        $customMessages = [
            'service_type_id.required' => 'Service Type field is required',
            'serverice_id.required' => 'Service field is required',
            'checkin.required' => 'Chcke In time field is required',
            'checkout.required' => 'Chcke Out time field is required',
            'duration.required' => 'Duration field is required',
        ];

        $this->validate($request,$role, $customMessages);
        $user = Auth::user();
        $serviceconfig = new ServiceConfigure;
        $serviceconfig->service_types_id = $request->input('service_type_id');
        $serviceconfig->services_id = $request->input('serverice_id');
        $serviceconfig->check_in =$request->input('checkin');
        $serviceconfig->check_out = $request->input('checkout');
        $serviceconfig->duration = $request->input('duration');
        $serviceconfig->status = $request->input('status');
        $serviceconfig->created_by = $user->id;
        $serviceconfig->save();
        session()->flash('message', 'ServiceConfigure Create Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/ServiceConfigure');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('serviceconfigure.view', ServiceConfigure::class);
        $serviceconfigure = ServiceConfigure::find($id);
        return view('admin.ServiceConfigure.show', compact('serviceconfigure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('serviceconfigure.update', ServiceConfigure::class);
        $servicetype = ServiceType::all();
        $service = Service::all();
        $serviceconfigure = ServiceConfigure::find($id);
        return view('admin.ServiceConfigure.edit', compact('servicetype', 'service', 'serviceconfigure'));
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
        $this->authorize('serviceconfigure.update', ServiceConfigure::class);
        $validateData = $request->validate([
            'service_type_id'=> 'required',
            'serverice_id' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'duration' => 'required',
        ]);
        $user = Auth::user();
        $serviceconfig =ServiceConfigure::find($id);
        $serviceconfig->service_types_id = $request->input('service_type_id');
        $serviceconfig->services_id = $request->input('serverice_id');
        $serviceconfig->check_in = $request->input('checkin');
        $serviceconfig->check_out = $request->input('checkout');
        $serviceconfig->duration = $request->input('duration');
        $serviceconfig->status = $request->input('status');
        $serviceconfig->updated_by = $user->id;
        $serviceconfig->save();
        session()->flash('message', 'ServiceConfigure Update Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/ServiceConfigure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('serviceconfigure.delete', ServiceConfigure::class);
        $serviceconfigure= serviceconfigure::find($id);
        $serviceconfigure->delete();
        session()->flash('message', 'ServiceConfigure Delete Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/ServiceConfigure');
    }
}
