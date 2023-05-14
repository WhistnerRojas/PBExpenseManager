<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Users extends Controller
{
    public function viewUser(){
        $viewUsers = $this->getAllUser();
        return view('user', ['viewUsers' => $viewUsers]);
    }
    public function getAllUser(){
        
        $this->middleware('auth');

        $Users = User::all();

        return $Users;
    }

    public function addUsers(){
        
    }
}
