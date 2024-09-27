<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    | Controlador de Restablecimiento de Contraseña
    | Este controlador gestiona las solicitudes de restablecimiento de
    | contraseña utilizando un trait para incluir esta funcionalidad.
    */

    use ResetsPasswords;

    /**
     * Redirigir a los usuarios después de restablecer su contraseña.
     *
     * @var string
     */
    protected $redirectTo = '/home';
}
