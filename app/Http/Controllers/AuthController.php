<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\User;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
    public function reset()
    {
        return view('auth.passwords.reset');
    }

    public function send(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            $user->password = Hash::make($user->document);
            $code = rand(100000,999999);
            $user->code = $code;
            $user->save();
            Mail::to($user->email)->send(new ResetPassword($code));
            $error = "Correo Enviado";
            $message = "Se te envio un correo a la dirección de:".$request->email;
        }else{
            $error = "Correo no encontrado";
            $message = "El correo ".$request->email.", no se encuentra registrado";
        }
        return view('error', compact('error', 'message'));
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
