<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function indexLogin(){
        return view('login');
    }

    public function indexRegister()
    {
        $users = User::all();
        return view('register', compact('users'));
    }

    public function storeRegister(Request $request)
    {

        $user = new User();

        $user->name         =  $request->name;
        $user->document     =  $request->document;
        $user->email        =  $request->email;;
        $user->password     =  "";
        $user->charge       =  $request->charge;
        $user->is_manager   =  0;

        if(!$validEmail = User::where('email', $user->email )
                    ->first()){
            $user->save();
            return "Acabo de crearse";
        }else{
            return "El registro ya existe";
        }
    }


    public function createLogin()
    {
        return view('login');
    }

    public function changes()
    {
        return view('auth.passwords.changePassword');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'code' => ['required', 'integer', 'min:100000', 'max:999999'],
        ]);

        if ($user->code == $validatedData['code']) {
            $user->update([
                'password' => Hash::make($validatedData['password']),
                'code' => 0
            ]);
            return redirect()->route('home');
        }else{
            $error = "401";
            $message ="Code do not match";
            return view('error', compact('error', 'message'));
        }
    }



    public function logout($users){
        return "aqui se mostrara el admin $users";
    }
}
