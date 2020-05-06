<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('role.view', Role::class);
        $role = Role::all();
        return view('admin.Role.list', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('role.create', Role::class);
        $permission = Permission::all();
        //$permission = Permission::select('pagename')->distinct()->get();
        return view('admin.Role.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('role.create', Role::class);
        $validateData = $request->validate([
            'name' => ['required'],
        ]);
        $role = new Role;
        $role->name = $request->input('name');
        $role->save();
        $role->permissions()->sync($request->permission);
        session()->flash('message', 'Role Create Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Role');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('role.update', Role::class);
        $permission = Permission::all();
        $role = Role::find($id);
        return view('admin.Role.edit', compact('role', 'permission'));
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
        $this->authorize('role.update', Role::class);
        $validateData = $request->validate([
            'name' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->permissions()->sync($request->permission);
        session()->flash('message', 'Role Update Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Role');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('role.delete', Role::class);
        $role = Role::find($id);
        $role->delete();
        session()->flash('message', 'Role Delete Successfully.');
        session()->flash('type', 'success');
        return redirect('admin/Role');
    }
}
