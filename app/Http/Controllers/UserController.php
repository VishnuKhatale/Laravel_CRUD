<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    public function index(){
        $user = new Users();
        $users = $user::all();
        return view('users/user_list', compact('users'));
    }

    public function create_user(){
        return view('users/add');
    }
    public function save_user(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255', // Ensures the email is unique
        ]);

        // Store the validated data
        $user = new Users(); // Assuming you have a User model
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return redirect('User/list')->with('success','Data Inserted Successfully');

    }

    public function edit_user($id){
        $user = Users::find($id);
        return view('users/edit', compact('user'));
    }

    public function update_user(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255', // Ensure the email is unique except for the current user
        ]);

        $user = Users::find($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();
        return redirect('User/list')->with('success', 'Data Updated Successfully');
    }



    public function delete_user($id)
    {
        $user = Users::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404); // User not found
        }
        $user->delete();
        return redirect('User/list')->with('success','Data Deleted Successfully');
    }



}
