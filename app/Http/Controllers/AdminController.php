<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return 12 + 1;
    }

    public function navbar(){
        return view('navbar');
    }

    public function login(){
        return view('inicio_sesion');
    }
}
