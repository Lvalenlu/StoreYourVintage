<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller
{
    // Verificar autenticación de usuario
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar auditorías según la opción seleccionada
    public function index($option)
    {
        $user = Auth::user();
        switch ($option) {
            case 'products':
                $audits = Audit::where('users_id', $user->id)->where('type', '1')->get();
                break;
            case 'users':
                $audits = Audit::where('users_id', $user->id)->where('type', '2')->get();
                break;
            case 'allProducts':
                $audits = Audit::where('type', '1')->get();
                break;
            case 'allUsers':
                $audits = Audit::where('type', '2')->get();
                break;
            default:
            $error = 404;
            $message="option not found";
                return view('error', compact('error', 'message'));
                break;
        }
        //Retorna a la vista de auditorías
        return view('audits.index', compact('audits', 'user'));
    }

}
