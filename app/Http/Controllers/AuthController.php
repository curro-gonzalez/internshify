<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Este controlador será el encargado de gestionar el login.
 */
class AuthController extends Controller
{
    /**
     * Muestra el formulario de login. Solo redirige a la pantalla de login.
     * Se utiliza este nombre en web.php para configurar la ruta.
     * @return Blade del formulario de login
     */
    public function index() {
        return view('auth.login');
    }

    /**
     * Se configura en nuestro web.php por POST para hacer el login.
     * Recibe email y password para hacer el login, y delegamos en
     * Laravel la gestión de login.
     * @param Request $request
     * @return Pagina de inicio de nuestra aplicación
     */
    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        //Esta es la forma que tienen laravel de comprobar si las credenciales son correctas.
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //Esto redirige a la ruta que tenga ->name('classes.show'), porque usamos el método
            // route(). Siempre que usemos route() se mira el name, incluso en los blade.
            return redirect()->route('classes.show');
        }

        //El método back() nos manda a la página de la que veníamos.
        /* haciendo -> withErrors() podemos enviar de vuelta mensajes de error
            en la variable @errors en el propio blade.
        */
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request) {

    }

}
