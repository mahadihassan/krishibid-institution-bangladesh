<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Intervention\Image\Facades\Image;
use App\Slider;
use Illuminate\Support\Facades\Auth;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('slider.view', Slider::class);
        $slider = Slider::all();
        return view('admin.Slider.list', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('slider.create', Slider::class);
        return view('admin.Slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('slider.create', Slider::class);
        $validateData = $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);

        $slider = new  Slider;
        $slider->title = $request->input('title');
        if($file = $request->file('image')){
            $name = rand().$file->getClientOriginalName();
            $file->move(public_path('Image/Slider'), $name);
            $slider->image = $name;
        }
        $slider->description = $request->input('description');
        $slider->status = $request->input('status');
        //dd($slider);
        $slider->save();
        session()->flash('message', 'Slider Create Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Slider');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('slider.update', Slider::class);
        $slider = Slider::find($id);
        return view('admin.Slider.edit', compact('slider'));
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
        $this->authorize('slider.update', Slider::class);
        $validateData = $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);
        $slider =Slider::find($id);
        $slider->title = $request->input('title');
         if($file = $request->file('image')){
            $name = "";
            $album = $slider->image;
            $filename = public_path() . '/Image/Slider/' . $album;
            \File::delete($filename);
            $name = rand().$file->getClientOriginalName();
            $file->move(public_path('Image/Slider'), $name);
            $slider->image = $name;
        }
        $slider->description = $request->input('description');
        $slider->status = $request->input('status');
        $slider->save();
        session()->flash('message', 'Slider Update Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('slider.delete', Slider::class);
        $slider = Slider::find($id);
        $file = $slider->image;
        $filename = public_path() . '/Image/Slider/' . $file;
        \File::delete($filename);
        $slider->delete();
        session()->flash('message', 'Slider Delete Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Slider');

    }
}
