<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use DB;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private UserRepository $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function formRegister()
    {
        return view('auth.form-register');
    }

    public function formLogin()
    {
        return view('auth.form-login');
    }

    public function processLogin(Request $request)
    {
        $request->validate(User::validationRules(), User::validationMessages());

        $credentials = $request->only(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            return redirect()
                ->route('auth.formLogin')
                ->with('feedback.message', 'Las credenciales ingresadas no coinciden con nuestros registros')
                ->with('feedback.type', 'danger')
                ->withInput();
        }

        $request->session()->regenerate();

        return redirect()
            ->route('home')
            ->with('feedback.message', 'Sesion iniciada con exito !Hola de nuevo!');
    }

    public function processRegister(Request $request)
    {
        $request->validate(User::validationRules(), User::validationMessages());

        $credentials = $request->only(['email', 'password']);
        $credentials['password'] = Hash::make($credentials['password']);

        $this->repo->create($credentials);

        return redirect()
            ->route('auth.formLogin')
            ->with('feedback.message', 'Sesion iniciada con exito !Hola de nuevo!');
    }

    public function processLogout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.formLogin')
            ->with('feedback.message', 'La sesion se cerro con exito. ¡Te esperamos de nuevo!');
    }
}
