<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class EventController extends Controller
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
        $this->authorize('event.view', Event::class);
        $event = Event::orderBy('id', 'ASC')->get();
        return view('admin.Event.list', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('event.create', Event::class);
        return view('admin.Event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('event.create', Event::class);
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $event = new Event;
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->status = $request->input('status');
        $event->save();
        session()->flash('message', 'Event Create Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Event');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('event.update', Event::class);
        $events = Event::find($id);
        return view('admin.Event.edit', compact('events'));
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
        $this->authorize('event.update', Event::class);
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $event =Event::find($id);
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->status = $request->input('status');
        $event->save();
        session()->flash('message', 'Event Update Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('event.delete', Event::class);
        $events = Event::find($id);
        $events->delete();
        session()->flash('message', 'Event Delete Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Event');

    }
}
