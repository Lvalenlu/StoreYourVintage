<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return "hola";
    }

    public function create(){
        return view('v2_inicio_sesion');
    }
}
