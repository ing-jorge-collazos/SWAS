<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validación
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Buscar usuario
        $usuario = Usuarios::where('email', $request->email)->first();

        // Verificar credenciales
        if ($usuario && Hash::check($request->password, $usuario->password)) {
            session(['usuario_id' => $usuario->id]);
            return redirect('/home');
        }

        // Error si no coincide
        return back()->with('error', 'Credenciales incorrectas');
    }
}
