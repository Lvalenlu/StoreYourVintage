<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customers.customers', compact('customers'));
    }

    public function destroy($id){
        $customers = Customer::find($id);
        $newStatus = ($customers->status == 0) ? 1 : 0;
        $customers->status = $newStatus;
        $customers->save();
        $audits = new Audit();
        $status = ($newStatus == 0) ? 'Desactivo' : 'Activo';
        $audits->description = 'Se '.$status.' al usuario con ID:'.$id;
        $audits->id_users = Auth::id();
        $audits->save();
        return redirect()->route('customers.index');
    }
}
