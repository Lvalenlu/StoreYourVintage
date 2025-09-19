<?php

namespace App\Http\Controllers;

use App\Mail\UsersCreateMail;
use App\Models\Audit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
        return view('users.manager.manager', compact('users'));
    }

    public function create(){
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'document'  => ['required', 'integer', 'max:10000000000', 'min:10000000'],
            'password'  => ['required', 'string', 'max:20'],
        ]);

        $code = rand(100000,999999);
        // $email = $validatedData['email'];
        // Mail::to($email)->send(new UsersCreateMail($code, $email));

        $user = new User();

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->document = $validatedData['document'];
        $user->password = Hash::make($validatedData['password']);
        $user->charge = "por ahora no hay mas cargos";
        $user->is_manager = 0;
        $user->code = $code;

        $user->save();

        return redirect()->route('users.index');
    }

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
    public function destroy($id, Request $request){
        $users = User::find($id);
        $newStatus = ($users->status == 0) ? 1 : 0;
        $users->status = $newStatus;
        $users->save();

        //Crear Auditoria
        $audits = new Audit();
        $status = ($newStatus == 0) ? 'desactivó' : 'activó';
        $audits->reason = $request->reason;
        $audits->type = 2;
        $audits->description = 'Se '.$status.' al usuario #'. $id. '<br> Nombre: ' . $users->name .  ' ' . $users->lastName . '<br> Documento: ' . $users->document;
        $audits->users_id = Auth::id();
        $audits->save();
        return redirect()->route('users.index');
    }
}

?>
