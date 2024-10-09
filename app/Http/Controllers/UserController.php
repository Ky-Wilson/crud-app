<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //here create all crud logic

    public function loadAllUsers(){
        $all_users = User::all();
        return view('users', compact('all_users'));
    }

    public function loadAddUserForm(){
        return view('add-user');
    }

    public function AddUser(Request $request){

        //form validation here
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'password' => 'required|confirmed|min:6|max:12',
        ]);
        try{
            $new_user = new User;
        $new_user->full_name = $request->full_name;
        $new_user->email = $request->email;
        $new_user->phone_number = $request->phone_number;
        $new_user->password = Hash::make($request->password);
        $new_user->save();
        return redirect('/users')->with('success','User added successfully');
        }catch(\Exception $e){
            return redirect('/add/user')->with('error',$e->getMessage());
        }
        //register user here

        
    }
}
