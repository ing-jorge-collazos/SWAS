<?php

use Illuminate\Support\Facades\Route;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', [AuthController::class, 'login']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/registro', function () {
    return view('registro');  // Vista con el formulario
});

Route::post('/registro', function (Request $request) {
    // Validar datos
    $request->validate([
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|min:6',
    ]);

    // Crear usuario con contraseña cifrada
    Usuarios::create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/registro')->with('success', 'Usuario registrado correctamente');
});


