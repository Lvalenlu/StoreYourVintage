<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    | Controlador de Restablecimiento de Contraseña    |
    | Este controlador gestiona el envío de correos para restablecer contraseñas
    | utilizando un trait para enviar notificaciones a los usuarios.
    |
    */

    use SendsPasswordResetEmails;
}

