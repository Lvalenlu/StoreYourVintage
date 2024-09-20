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
        return view('users.manager.manager', compact('users'));
    }

    public function edit(){
        $password = User::all();
        return view('auth.passwords.reset', compact('password'));
    }

    public function  update(Request $request, $id){
        $user = User::find($id);
        $validatedData = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'document'  => 'required|string|max:255',
            'charge'    => 'required|string|max:255',
        ]);
        $user->update($validatedData);
        
        return redirect()->route('profile')->with('success', 'Perfil actualizado exitosamente.');

    }    
    public function show(){
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }




}
