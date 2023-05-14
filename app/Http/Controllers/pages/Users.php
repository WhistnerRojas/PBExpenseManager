<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Roles;

class Users extends Controller
{
    public function viewUser(){
        $viewUsers = $this->getAllUser();

        // if ($viewUsers['user']->role !== 'Administrator') {
        //     return redirect()->route('home');
        // }
    
        return view('user', ['viewUsers' => $viewUsers]);
    }
    public function getAllUser(){

        $Users = User::all();
        $roleList = $this->getRoleList();

        return [
            'users' => $Users,
            'roleList' => $roleList,
        ];
    }

    public function getRoleList(){
        $roles = Roles::all(); // Retrieve all records from the UserRoles model
        return $roles; 
    }
    public function addUsers(Request $request){

        if($this->validateUserInput($request) === false){
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $role = $request->input('role');

            // Create a new User instance and assign values
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->role = $role;

            // Save the new record
            $user->save();

    // Redirect or perform other actions
    return redirect()->route('viewUsers')->with('success', 'User created successfully.');
        }else{
            return $this->validateUserInput($request);
        }
    }

    public function updateDeleteUser(Request $request){

        if($this->validateUserInput($request) === false){
            if($request->input('action') === 'Update'){
                return redirect()->route('viewUsers')->with('msg', $this->updateUser($request));
            }
            if($request->input('action') === 'Delete'){
                return redirect()->route('viewUsers')->with('msg', $this->deleteUser($request));
            }
        }
    }

    public function updateUser($request){
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $role = $request->input('role');

        // Create a new User instance and assign values
        $user = User::find($id);

        if ($user) {
            $user->name = $name;

            if ($user->email !== $email) {
                $userWithEmail = User::where('email', $email)->first();
                if (!$userWithEmail) {
                    $user->email = $email;
                }
            }

            if ($user->password !== $password) {
                $user->password = bcrypt($password);
            }

            $user->role = $role;

            // Save the updated record
            $user->save();

            return 'User updated successfully.';
        } else {
            return 'User update failed.';
        }
    }

    public function deleteUser($request){

    }
    
    public function validateUserInput($request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/u|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,display_name',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('viewUsers')->withErrors($validator)->withInput();
        }else{
            return false;
        }
    }

    //passwordUpdate
    public function viewEditUser(){
        return view('editUser');
    }

    public function updatePass(Request $request){
        
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // The validation passed, continue with changing the password logic
    
        // Retrieve the authenticated user ID
        $userId = auth()->id();
    
        // Find the user by ID
        $user = User::find($userId);
    
        // Check if the user exists
        if (!$user) {
            return redirect()->route('viewEditUsers')->withErrors(['current_password' => 'User not found.'])->withInput();
        }
    
        // Check if the current password matches the user's password
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->route('viewEditUsers')->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
        }
    
        // Set the new password for the user
        $user->password = bcrypt($request->input('new_password'));
        $user->save();
    
        return redirect()->route('viewEditUsers')->with('msg', 'Password changed successfully.');
    }
}
