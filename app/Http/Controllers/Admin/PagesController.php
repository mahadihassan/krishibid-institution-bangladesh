<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::all();
        return view('admin.Pages.list', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = [
            'title'=> 'required',
            'slug' => 'required',
            'description' => 'required',
        ];
        $customMessages = [
            'title.required' => 'Title field is required',
            'slug.required' => 'Slug field is required',
            'description.required' => 'Price field is required',
        ];
        $this->validate($request,$role, $customMessages);
        $pages = new Pages;
        $pages->title = $request->input('title');
        $pages->slug = $request->input('slug');
        $pages->description = $request->input('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = "Image/Pages/$filename";
            Image::make($image)->save($location);
            $pages->image = $filename;
        }
        $pages->status = $request->input('status');
        //dd($request->all());
        $pages->save();
        session()->flash('message', 'Page Create Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Pages');
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
        $pages = Pages::find($id);
        return view('admin.Pages.edit', compact('pages'));
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
        $role = [
            'title'=> 'required',
            'slug' => 'required',
            'description' => 'required',
        ];
        $customMessages = [
            'title.required' => 'Title field is required',
            'slug.required' => 'Slug field is required',
            'description.required' => 'Price field is required',
        ];
        $this->validate($request,$role, $customMessages);
        $pages =Pages::find($id);
        $pages->title = $request->input('title');
        $pages->slug = $request->input('slug');
        $pages->description = $request->input('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = "Image/Pages/$filename";
            Image::make($image)->save($location);
            $pages->image = $filename;
        }
        $pages->status = $request->input('status');
        //dd($request->all());
        $pages->save();
        session()->flash('message', 'Page Update Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = Pages::find($id);
        $file = $pages->image;
        $filename = public_path() . '/Image/Pages/' . $file;
        \File::delete($filename);
        $pages->delete();
        session()->flash('message', 'Page Delete Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Pages');
    }
}
