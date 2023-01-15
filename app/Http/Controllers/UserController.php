<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);
        $roles = Permission::all();

        return view('users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'role' => 'required|string'
        ]);

        $validated['name'] = ucwords(trim($validated['name']));
        $validated['password'] = bcrypt($validated['password']);
        $validated['email'] = strtolower($validated['email']);

        User::create($validated)->givePermissionTo($validated['role']);

        return Redirect::route('users.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            "id" => "required|integer",
            "name" => "required|string",
            "email" => "required|email",
            "password" => "string|nullable",
            "status" => "integer|required",
            "role" => "string|nullable"
        ]);

        $user = User::find($validated['id']);

        $validated['name'] = ucwords(trim($validated['name']));
        $validated['password'] = ($validated['password']) ? bcrypt($validated['password']) : $user->password;
        $validated['email'] = strtolower($validated['email']);

        $user->update($validated);

        $permissionNames = $user->getPermissionNames();

        if (!empty($validated['role'])) {
            if (count($permissionNames) > 0) {
                foreach ($permissionNames as $permissionName) {
                    $user->revokePermissionTo($permissionName);
                }
            }

            $user->givePermissionTo($validated['role']);
        }

        $user->save();

        return Redirect::route('users.index');
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->id != Auth()->user()->id) {
            $leads = Lead::where('user_id', $id)->get();

            foreach ($leads as $lead) {
                $lead->status = 0;
                $lead->save();
            }


            $user?->delete();
        }


        return Redirect::route('users.index');
    }
}
