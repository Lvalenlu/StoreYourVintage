<?php

namespace App\Http\Controllers;

use App\Mail\UsersCreateMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // Define longitud máxima de las cadenas
    const MAX_STRING_LENGTH = 255;

    // Constructor que aplica middleware de autenticación
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Muestra la lista de usuarios
    public function index()
    {
        $users = User::all();
        return view('users.manager.manager', compact('users'));
    }

    // Muestra el formulario para crear un usuario
    public function create()
    {
        return view('auth.register');
    }

    // Almacena un nuevo usuario y envía un correo con un código
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $validatedData = $request->validate([
            'name'      => ['required', 'string', 'max:' . self::MAX_STRING_LENGTH],
            'email'     => ['required', 'string', 'email', 'max:' . self::MAX_STRING_LENGTH, 'unique:users'],
            'document'  => ['required', 'integer', 'max:10000000000', 'min:10000000'],
            'charge'    => ['required', 'string', 'max:' . self::MAX_STRING_LENGTH],
        ]);

        // Genera un código de verificación y envía un correo
        $code = random_int(100000, 999999);
        Mail::to($validatedData['email'])->send(new UsersCreateMail($code, $validatedData['email']));

        // Crea y guarda el nuevo usuario
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->document = $validatedData['document'];
        $user->password = Hash::make($validatedData['document']); // La contraseña por defecto es el documento
        $user->charge = $validatedData['charge'];
        $user->is_manager = 0;
        $user->code = $code;
        $user->save();

        return redirect()->route('users.index');
    }

    // Muestra el perfil del usuario autenticado
    public function show()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    // Muestra el formulario de edición para un usuario específico
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado.');
        }
    }

    // Muestra el formulario de edición para el perfil del usuario logueado
    public function editProfile()
    {
        $user = Auth::user();
        return view('auth.edit-profile', compact('user'));
    }

    // Actualiza los datos de un usuario específico
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado.');
        }

        $validatedData = $request->validate([
            'name'      => 'required|string|max:' . self::MAX_STRING_LENGTH,
            'email'     => 'required|email|max:' . self::MAX_STRING_LENGTH,
            'document'  => 'required|string|max:' . self::MAX_STRING_LENGTH,
            'charge'    => 'required|string|max:' . self::MAX_STRING_LENGTH,
        ]);

        $user->update($validatedData);
        return redirect()->route('profile')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Elimina un usuario
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado.');
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}

