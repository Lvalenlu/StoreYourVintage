<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    // Mostrar pantalla de inicio de sesión
    public function indexLogin(){
        return view('login');
    }

    // Muestra pantalla de registro de usuarios
    public function indexRegister()
    {
        // Para que $isManager no devuelva null
        // $isManager = Auth::user() ? Auth::user()->is_manager == 1 : false;

        // if ($isManager){
            $users = User::all();
            return view('auth.register', compact('users'));
        // }else{
        //     $error = "Página no encontrada";
        //     $message = "No tiene acceso a este sitio";
        //     return view('error', compact('error', 'message'));
        // }
    }

    // Almacenar un nuevo registro de usuario
    public function storeRegister(Request $request)
    {
        $user = new User();

        $user->name         =  $request->name;
        $user->document     =  $request->document;
        $user->email        =  $request->email;;
        $user->password     =  "";// La contraseña se dejará vacía inicialmente
        $user->charge       =  $request->charge;
        $user->is_manager   =  0; // Por defecto, no es manager

        if(!$validEmail = User::where('email', $user->email )
                    ->first()){
            $user->save();
            return "Acabo de crearse";
        }else{
            return "El registro ya existe";
        }
    }

    // Mostar pantallas de creación, cambio y restablecimiento de contraseña
    public function create()
    {
        return view('auth.passwords.createPassword');
    }

    public function changes()
    {
        if ($user = Auth::user()) {
            return view('auth.passwords.changePassword');
        } else {
            return redirect()->route('login');
        }
    }


    public function reset()
    {
        return view('auth.passwords.reset');
    }

    // Envíar correo de restablecimiento de contraseña
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
            $message = " <br> Se te envio un correo a la dirección de: " . $request->email . ". <br> <br> Por favor revisa tu correo para restablecer tu contraseña <br> <br>";
            $link = "<a href='" . route('login') . "' target='_blank'>http://syv.test/login</a>";

        }else{
            $error = "Correo no encontrado";
            $message = "El correo ".$request->email.", no se encuentra registrado";
            $link = "<a href='" . route('login') . "' target='_blank'>http://syv.test/login</a>";
        }
        return view('error', compact('error', 'message', 'link'));
    }

     // Actualizar la contraseña del usuario cuando se olvida la contraseña
    public function update(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'password' => ['required', 'string', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', 'confirmed',
            function($attribute, $value, $fail) use ($request){
                if ($value === $request->current_password) {
                    $fail ('La nueva contraseña no puede ser igual a la contraseña actual.');
                }
            }],
            'code' => ['required', 'integer', 'min:100000', 'max:999999'],
        ]);

        // Verifica si el código proporcionado coincide
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

    // Actualiza la contraseña actual del usuario
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            $error = "Error";
            $message ="Usuario no autenticado. Volver a ingresar a: ";
            $link = "<a href='" . route('login') . "' target='_blank'>http://syv.test/login</a>";
            return view('error', compact('error', 'message', 'link'));
        }

        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'string', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', 'confirmed',
            function($attribute,$value, $fail) use ($request){
                if ($value === $request->current_password) {
                    $fail('La nueva contraseña no puede ser igual a la contraseña actual.');
                }
            }],
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        Auth::logout();

        return redirect()->route('login');
    }

}
