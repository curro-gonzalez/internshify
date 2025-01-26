<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Esto nos lleva a la pantalla de registro
     * @return Vista de register.blade.php
     */
    public function index() {
        return view('register');
    }

    /**
     * @param Request $request
     * @return Nos lleva a la pantalla de inicio de nuestra aplicacion, que hemos llamado "home"
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed', //Aseguramos que el password se confirme
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        auth()->login($user); // OJO!, esto es lo que el login
        // Esto nos redirige a la ruta que tenga ->name('classes.index') en nuestro web.php
        return redirect()->route('classes.index');
    }
}
