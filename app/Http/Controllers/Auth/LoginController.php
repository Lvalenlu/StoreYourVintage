<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    | Controlador de Inicio de Sesión
    | Este controlador maneja la autenticación de usuarios y redirección
    | a la pantalla principal. Usa un trait para proveer su funcionalidad.
    */

    use AuthenticatesUsers;

    /**
     * Redirigir a los usuarios después de iniciar sesión.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    // Lógica post-autenticación basada en el código de usuario
    protected function authenticated(Request $request, $user)
    {
        if ($user->code == 0) {
            return redirect()->route('home');
        }
        return redirect()->route('create.password');
    }

    // Usar 'document' como nombre de usuario en lugar de 'email'
    public function username()
    {
        return 'document';
    }

    /**
     * Crear una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        // Aplicar middleware para los usuarios invitados y autenticados
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
