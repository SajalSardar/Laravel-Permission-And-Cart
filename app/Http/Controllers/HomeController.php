<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application Role And Permission.
     *
     */
    public function RolePermission()
    {
        $roles       = Role::where('name', '!=', 'Super-Admin')->get();
        $permissions = Permission::all();
        return view('role.index', compact('roles', 'permissions'));
    }

    public function AssignPermission(Request $request)
    {
        $role       = Role::find($request->role);
        $permission = Permission::find($request->permission);
        $role->givePermissionTo($permission);
        return back();
    }

    public function AddPermission(Request $request)
    {
        Permission::create([
            'name' => $request->name,
        ]);
        return back();
    }

    public function DeletePermission($id)
    {
        $Perid = Permission::findOrFail($id);
        $Perid->delete();
        return back();
    }

    public function RevokPermission($rid, $pid)
    {

        $role       = Role::findOrFail($rid);
        $permission = Permission::findOrFail($pid);
        $role->revokePermissionTo($permission);
        return back();

    }

    public function test()
    {
        //Permission::create(['name' => 'add articles']);
        //Role::create(['name' => 'Editor']);
        //$role = Role::find(3);
        // $permission = Permission::find(3);
        // $role->givePermissionTo($permission);

        //$user = User::find(1);
        //dd($user->name);

        //$user = Auth::user();
        //$user_role = Role::all();

        // if ($user->hasRole('Admin')) {
        //     echo "Admin";
        // } else if ($user->hasRole('Editor')) {
        //     echo "Editor";
        // } else if ($user->hasRole('Department Head')) {
        //     echo "Department Head";
        // } else {
        //     echo "User";
        // }

        // echo $user->roles()->pluck('name');
    }
}
