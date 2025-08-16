<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Tables\Users; 
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\ExistingFile;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Storage;
//use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


//use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('users.index',[
            'users' => Users::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create', [
            'permissions' => Permission::pluck('name', 'id')->toArray(),
            'roles' => Role::pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        $tempCount = User::count()+1;
       // dd($tempCount);

        $request->validated();
        $user = User::create([
            'emp_id' =>  $tempCount,
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->input('password'))

            //'password' => Hash::make($request->input('password'))
        ]);

        
        $roles = Role::whereIn('id', $request->roles)->get();

        $user->syncRoles($roles);

        $permissions = Permission::whereIn('id', $request->permissions)->get();
        
        $user->syncPermissions($permissions);


        Toast::title('User Created')->autoDismiss(2);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

    $roles = Role::pluck('name', 'id')->toArray();
    $permissions = Permission::pluck('name', 'id')->toArray();

      return view('users.edit', [
        'user' => $user,
       'userRole' => $user->roles->pluck('id')->toArray(),
       'userPermission' => $user->permissions->pluck('id')->toArray(),

        'roles' => $roles,
        'permissions' => $permissions,

        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        //dd($request);

        $request->validated();
        $user->update([
            'emp_id' =>  $request->emp_id,
            'name' => $request->name,
            'email' => $request->email
        ]);

        $roles = Role::whereIn('id', $request->roles)->get();
        $user->syncRoles($roles);
        
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $user->syncPermissions($permissions);

        Toast::title('Record Updated')->warning()->autoDismiss(2);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //

        $user->delete();
        Toast::title('User Deleted')->danger()->autoDismiss(2);
        //return redirect()->route('admin.users.index');
        return back();
    }
}
