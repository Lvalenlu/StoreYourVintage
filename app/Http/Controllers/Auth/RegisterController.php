<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UsersCreateMail;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    | Controlador de Registro
    | Este controlador gestiona el registro, validación y creación de nuevos
    | usuarios. Utiliza un trait para proporcionar esta funcionalidad sin
    | requerir código adicional.
    */

    use RegistersUsers;

    /**
     * Redirigir a los usuarios después del registro.
     *
     * @var string
     */
    protected $redirectTo = '/products';

    /**
     * Máxima longitud de los campos de texto.
     */
    private const MAX_STRING_LENGTH = 255;

    /**
     * Crear una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        // Aplicar middleware para usuarios invitados
        $this->middleware('guest');
    }

    /**
     * Validar los datos del formulario de registro.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => ['required', 'string', 'max:' . self::MAX_STRING_LENGTH],
            'email'     => ['required', 'string', 'email', 'max:' . self::MAX_STRING_LENGTH, 'unique:users'],
            'document'  => ['required', 'integer', 'max:10000000000', 'min:10000000'],
            'charge'    => ['required', 'string', 'max:' . self::MAX_STRING_LENGTH],
        ]);
    }

    /**
     * Crear una nueva instancia de usuario después de una validación exitosa.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $code = random_int(100000,999999);
        $email = $data['email'];
        // Enviar un correo con el código de activación
        Mail::to($email)->send(new UsersCreateMail($code, $email));

        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['document']),
            'document'  => $data['document'],
            'charge'    => $data['charge'],
            'is_manager'=> 0,
            'code'      => $code,
        ]);
    }
}
