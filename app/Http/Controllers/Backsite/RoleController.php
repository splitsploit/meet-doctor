<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use Gate;
use Auth;

use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;

use App\Models\ManagementAccess\Role;
use App\Models\ManagementAccess\Permission;
use App\Models\ManagementAccess\PermissionRole;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::orderBy('created_at', 'desc')->get();

        // dd($data);

        return view('pages.backsite.management-access.role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $data = $request->all();

        $data = Role::create($data);

        alert()->success('Success Message', 'Successfully added new Role');

        return redirect()->route('backsite.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role->load('permission');

        return view('pages.backsite.management-access.role.index', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permission = Permission::all();

        $role->load('permission');

        // dd($role);

        return view('pages.backsite.management-access.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        // cara 1

        // $data = $request->all();
        // $role->update($data);

        // cara 2

        $role->update($request->all());
        
        $role->permission()->sync($request->input('permission', []));

        alert()->success('Message Success', 'Successfully update new Role');

        return redirect()->route('backsite.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $data = Role::find(1);

        $data->forceDelete();

        alert()->success('Success Message', 'Successfully delete data');

        return back();
    }
}
