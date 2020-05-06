<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('permission.view', Permission::class);
        $permission = Permission::all();
        return view('admin.Permission.list', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('permission.create', Permission::class);
        return view('admin.Permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('permission.create', Permission::class);
        $validateData = $request->validate([
            'name' => 'required',
        ]);
        $permission = new Permission;
        $permission->name = $request->input('name');
        $permission->slug = $request->input('slug');
        $permission->save();
        return back();
        /*
        session()->flash('message', 'Permission Create Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Permission');*/
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
        $this->authorize('permission.update', Permission::class);
        $permission = Permission::find($id);
        return view('admin.Permission.edit', compact('permission'));
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
        $this->authorize('permission.update', Permission::class);
        $validateData = $request->validate([
            'name' => 'required',
        ]);
        $permission =Permission::find($id);
        $permission->name = $request->input('name');
        $permission->slug = $request->input('slug');
        $permission->save();
        session()->flash('message', 'Permission Update Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('permission.delete', Permission::class);
        $permission = Permission::find($id);
        $permission->delete();
        return redirect('admin/Permission');
    }
}
