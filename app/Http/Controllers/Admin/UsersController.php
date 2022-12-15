<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index',compact('users'));
    }
    public function create_user()
    {
        return view('dashboard.users.create');
    }
    public function create_user_submit(CreateUserRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles = $request->roles;
        $user->save();
        return redirect()->route('users.index')->with('create_user','User Added Successfully!');
    }

    public function edit_user($id){
        $user = User::find($id);
        return view('dashboard.users.edit', compact('user'));
    }
    public function edit_user_submit(CreateUserRequest $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles = $request->roles;
        $user->update();
        return redirect()->route('users.index')->with('edit_user','User Updated Successfully!');
    }
    public function delete_user($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('delete_user','User Deleted Successfully!');
    }
}
