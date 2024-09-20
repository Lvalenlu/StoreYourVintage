<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $customers = Customer::all();
        return view('customers.customers', compact('customers'));
    }

    public function destroy($id, Request $request){
        $customers = Customer::find($id);
        $newStatus = ($customers->status == 0) ? 1 : 0;
        $customers->status = $newStatus;
        $customers->save();

        //Crear Auditoria
        $audits = new Audit();
        $status = ($newStatus == 0) ? 'desactivó' : 'activó';
        $audits->reason = $request->reason;
        $audits->type = 2;
        $audits->description = 'Se '.$status.' al usuario #'. $id. '<br> Nombre: ' . $customers->name .  ' ' . $customers->lastname . '<br> Documento: ' . $customers->document;
        $audits->id_users = Auth::id();
        $audits->save();
        return redirect()->route('customers.index');
    }
}
