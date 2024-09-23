<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Verificar autenticación de usuario
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Listar todos los usuarios
    public function index(){
        $users = User::all();
        return view('users.manager.manager', compact('users'));
    }

    // Mostrar el perfil del usuario logueado
    public function show(){
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    // Encuentra el usuario por su ID
    public function edit($id)
    {

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado.');
        }

    }

    // Método para editar el perfil del usuario logueado
    public function editProfile(){
        $user = Auth::user();
        return view('auth.edit-profile', compact('user'));
    }

    // Método para editar un usuario por su ID
    public function editUser($id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado.');
        }
    }

    // Método para actualizar datos de un usuario
    public function update(Request $request, $id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado.');
        }

        $validatedData = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'document'  => 'required|string|max:255',
            'charge'    => 'required|string|max:255',
        ]);

        $user->update($validatedData);

        return redirect()->route('profile')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Método para eliminar un usuario
    public function destroy($id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado.');
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}

?>
