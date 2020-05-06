<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Service;
use App\ServiceType;


class ServiceController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('service.view', Service::class);
        $service = Service::orderBy('id', 'DESC')->get();
        return view('admin.Service.list', compact('service'));
    }



    public function ServiceType(Request $request)
    {
        $states = Service::where("servericeType",1);
        return response()->json($states);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('service.create', Service::class);
        $servericeType = ServiceType::all();
        return view('admin.Service.create', compact('servericeType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('service.create', Service::class);
        $role = [
            'servericeType'=> 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'capacity' => 'required',
            'description' => 'required',
            'terms_condition' => 'required',
        ];
        $customMessages = [
            'servericeType.required' => 'Service Type field is required',
            'name.required' => 'Service Name field is required',
            'price.required' => 'Service Cost field is required',
            'image.required' => 'Image field is required',
            'capacity.required' => 'Capacity field is required',
            'description.required' => 'Description field is required',
            'terms_condition.required' => 'Terms & Condition field is required',
        ];
        $this->validate($request,$role, $customMessages);
        $user = Auth::user();
        $service = new Service;
        $service->service_types_id = $request->input('servericeType');
        $service->name = $request->input('name');
        $service->price = $request->input('price');
        $service->capacity = $request->input('capacity');
        if($file = $request->file('image'))
        {
            $name = rand().$file->getClientOriginalName();
            $file->move(public_path('Image/Service'), $name);
            $service->image = $name;
        }
        $service->description = $request->input('description');
        $service->terms_condition = $request->input('terms_condition');
        $service->status = $request->input('status');
        $service->created_by =$user->id;
        $service->save();
        session()->flash('message', 'Service Create Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Service');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('service.view', Service::class);
        $services = Service::find($id);
        return view('admin.Service.show', compact('services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('service.update', Service::class);
        $servericeType = ServiceType::all();
        $services = Service::find($id);
        return view('admin.Service.edit', compact('services', 'servericeType'));
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
        $this->authorize('service.update', Service::class);
         $role = [
            'servericeType'=> 'required',
            'name' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            'description' => 'required',
            'terms_condition' => 'required',
        ];
        $customMessages = [
            'servericeType.required' => 'Service Type field is required',
            'name.required' => 'Service Name field is required',
            'price.required' => 'Service Cost field is required',
            'capacity.required' => 'Capacity field is required',
            'description.required' => 'Description field is required',
            'terms_condition.required' => 'Terms & Condition field is required',
        ];
        $this->validate($request,$role, $customMessages);
        $user = Auth::user();
        $service =Service::find($id);
        $service->service_types_id = $request->input('servericeType');
        $service->name = $request->input('name');
        $service->price = $request->input('price');
        $service->capacity = $request->input('capacity');
        if($file = $request->file('image')){
            $name = "";
            $album = $service->image;
            $filename = public_path() . '/Image/Service/' . $album;
            \File::delete($filename);
            $name = rand().$file->getClientOriginalName();
            $file->move(public_path('Image/Service'), $name);
            $service->image = $name;
        }
        $service->description = $request->input('description');
        $service->terms_condition = $request->input('terms_condition');
        $service->status = $request->input('status');
        $service->updated_by =$user->id;
        $service->save();
        session()->flash('message', 'Service Update Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('service.delete', Service::class);
        $service = Service::find($id);
        $file = $service->image;
        $filename = public_path() . '/Image/Service/' . $file;
        \File::delete($filename);
        $service->delete();
        session()->flash('message', 'Service Delete Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Service');
    }
}