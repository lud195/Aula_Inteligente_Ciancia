<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:alumno,docente,admin',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registro exitoso. ¡Bienvenido!');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'Credenciales inválidas.',
        ])->onlyInput('email');
    }

    protected $redirectTo = '/home';

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Sesión cerrada correctamente.');
    }

    // Mostrar perfil
    public function perfil()
    {
        $usuario = auth()->user();
        return view('perfil', compact('usuario'));
    }

    // Actualizar perfil
    public function updatePerfil(Request $request)
    {
        $usuario = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $usuario->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if ($request->hasFile('foto')) {
            // Borrar foto anterior si existe
            if ($usuario->foto && Storage::exists('public/' . $usuario->foto)) {
                Storage::delete('public/' . $usuario->foto);
            }

            $ruta = $request->file('foto')->store('fotos_perfil', 'public');
            $usuario->foto = $ruta;
        }

        $usuario->save();

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}
