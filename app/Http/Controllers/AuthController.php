<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

        $user->name      =  $request->name;
        $user->document      =  $request->document;
        $user->email       =  $request->email;;
        $user->password  =  "hola";
        $user->charge       =  $request->charge;
        $user->is_manager      =  1;

        $user->save();

        return redirect('/login');
    }

    public function storeLogin(Request $request){

        $user = new User();

        $user->document      = $request->document;
        $user->password  = $request->password;

        $credentials = $request->validate([
            'document'=>['required'],
            'password'=>['required']
        ]);

        if (Auth::attempt([
            'document'        => $credentials['document'],
            'password'    => $credentials['password']
            ])) {
            // Regenerar la sesión para evitar fijación de sesión
            $request->session()->regenerate();

            // Redirigir o mostrar un mensaje de éxito
            return redirect('/products')->with('success', 'Inicio de sesión exitoso');
        } else {
            // Si la autenticación falla, devolver un error
            return back()->withErrors([
                'document' => 'Las credenciales no coinciden con nuestros registros.',
            ]);


        }
    }

    public function createLogin()
    {
        return view('login');
    }

    public function createRegister()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $cr)
    {
        //
    }

    public function logout($users){
        return "aqui se mostrara el admin $users";
    }
}
