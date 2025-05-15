<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show users list
    public function index(){
        $users = User::orderBy('created_at','DESC')->get();
        return view('users.list', [
            'users' => $users
        ]);
    }

    // Show create user form
    public function create(){
        return view('users.create');
    }

    // Store new user in database
    public function store(Request $request){
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10',
            'address' => 'required',
            'role' => 'required',
            'password' => 'required|min:6|confirmed',
        ];
        
        if ($request->hasFile('profile_photo')) {
            $rules['profile_photo'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('users.create')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
       

        if ($request->hasFile('profile_photo')) {
            $image = $request->file('profile_photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile'), $imageName);
            $user->profile_photo = $imageName;
            $user->save();
        }
         $user->save();
        
        return redirect()->route('users.index')->with('success', 'User added successfully.');
    }

    // Show edit user form
    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    // Update user details
    public function update($id, Request $request){
        $user = User::findOrFail($id);

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|min:10',
            'address' => 'required',
            'role' => 'required',
        ];

        if ($request->hasFile('profile_photo')) {
            $rules['profile_photo'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $user->id)->withInput()->withErrors($validator);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->save();

        if ($request->hasFile('profile_photo')) {
            File::delete(public_path('uploads/profile/'.$user->profile_photo));
            $image = $request->file('profile_photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile'), $imageName);
            $user->profile_photo = $imageName;
            $user->save();
        }
        
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Delete user
    public function destroy($id){
        $user = User::findOrFail($id);
        File::delete(public_path('uploads/profile/'.$user->profile_photo));
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
