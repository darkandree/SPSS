<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Tables\Permissions;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view('permissions.index', [
            'permissions' => Permissions::class
        ]);
    }

    public function create()
    {
        return view('permissions.create',[
            'roles' => Role::pluck('name', 'id')->toArray()
        ]);
    }

    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->validated());

        $roles = Role::whereIn('id', $request->roles)->get();
        
        $permission->syncRoles($roles);
        
        Toast::title('Permission Created')->autoDismiss(2);    
        //return to_route('admin.permissions.index');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', [
            'permission' => $permission,
            'roles' => Role::pluck('name', 'id')->toArray() 
        ]);
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        //$permission->syncRoles($request->roles);

        //$roles = Role::whereIn('id', $request->roles)->get();

        $roles = Role::whereIn('id', $request->roles)->orWhereNull('id')->get();
      
        //$roles = Role::whereIn('id', $request->roles)->orWhereNull('id')->get();

        $permission->syncRoles($roles);

        Toast::title('Permission Updated')->warning()->autoDismiss(2);
        return back();
        //return to_route('apermissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        Toast::title('Permission Deleted')->danger()->autoDismiss(2);
        return back();
    }
}


