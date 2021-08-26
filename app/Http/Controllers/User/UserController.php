<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
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

    public function index()
    {
        $users = User::with('roles')->select(['id', 'name', 'status', 'email_verified_at', 'created_at'])->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::where('name', '!=', 'Super-Admin')->get();
        return view('users.create', compact('roles'));
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'     => 'required',
        ]);
        $id = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $id->assignRole($request->role);
        return redirect()->route('all.users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        // if ($user->name == "Super-Admin") {
        //     return redirect()->route('all.users');
        // }
        $roles = Role::where('name', '!=', 'Super-Admin')->get();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request)
    {
        dd($request->role);
    }
}
