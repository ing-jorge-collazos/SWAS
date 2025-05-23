<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (!session()->has('usuario_id')) {
            return redirect('/login')->with('error', 'Debes iniciar sesión.');
        }

        return view('home');
    }
}
