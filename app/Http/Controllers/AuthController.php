<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function indexLogin(){
        return view('v2_inicio_sesion');
    }

    public function indexRegister()
    {
        $admins = Administrador::all();
        return view('v3_registro_admin', compact('admins'));
    }

    public function storeRegister(Request $request)
    {

        $admin = new Administrador();

        $admin->nombre      =  $request->nombre;
        $admin->cedula      =  $request->cedula;
        $admin->email       =  $request->email;;
        $admin->contrasena  =  "hola";
        $admin->cargo       =  $request->cargo;
        $admin->gestor      =  1;

        $admin->save();

        return redirect('/login');
    }

    public function storeLogin(Request $request){

        $admin = new Administrador();

        $admin->cedula      = $request->cedula;
        $admin->contrasena  = $request->contrasena;

        $credentials = $request->validate([
            'cedula'=>['required'],
            'contrasena'=>['required']
        ]);

        if (Auth::attempt([
            'cedula'        => $credentials['cedula'],
            'contrasena'    => $credentials['contrasena']
            ])) {
            // Regenerar la sesión para evitar fijación de sesión
            $request->session()->regenerate();
        
            // Redirigir o mostrar un mensaje de éxito
            return redirect('/products')->with('success', 'Inicio de sesión exitoso');
        } else {
            // Si la autenticación falla, devolver un error
            return back()->withErrors([
                'cedula' => 'Las credenciales no coinciden con nuestros registros.',
            ]);

       
        }
    }

    public function createLogin()
    {
        return view('v2_inicio_sesion');
    }

    public function createRegister()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrador $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrador $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrador $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrador $cr)
    {
        //
    }

    public function logout($admins){
        return "aqui se mostrara el admin $admins";
    }
}
