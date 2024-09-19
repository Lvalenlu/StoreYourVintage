<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
        return view('users.manager', compact('users'));
    }

    public function edit(){
        $password = User::all();
        return view('auth.passwords.reset', compact('password'));
    }

    public function  update(Request $request, $id){


    }
    public function show(){
        $user = Auth::user();
        return view('users.profile', compact('customer'));
    }




}
