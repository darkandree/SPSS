<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Tables\Roles;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index', [
            'roles' => Roles::class
        ]);
    }

    public function create()
    {
        return view('roles.create', [
            'permissions' => Permission::pluck('name', 'id')->toArray()
        ]);
    }

    public function store(StoreRoleRequest $request)
    {

        $role = Role::create($request->validated());
        
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        //$role->syncPermissions($request->$permissions);
        
        $role->syncPermissions($permissions);

        Toast::title('Role Created')->autoDismiss(2);

        return to_route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')->toArray()
        ]);
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
        $role->update($request->validated());

        $permissions = Permission::whereIn('id', $request->permissions)->get();

        $role->syncPermissions($permissions);

        Toast::title('Record Updated')->warning()->autoDismiss(2);
        return back();
      
       
    }

    public function destroy(Role $role)
    {
        //
        $role->delete();

        Toast::title('Role Deleted')->danger()->autoDismiss(2);

        //return redirect()->route('admin.users.index');
        
        return back();
    }

}


