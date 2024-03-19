<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd($request->get('username'));
        // Modificar el Request
        $request->request->add(['paciente' => Str::slug($request->paciente)]);

        // Validacion
        $request->validate([
            'name' => 'required|max:30',
            'paciente' => "required|unique:users|min:3|max:80",
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

            // dd('Guardando usuario');

            User::create([
                'name' => $request->name,
                'paciente' => $request->paciente,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            //Autenticar usuario
            auth()->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);

            //Redireccionar
            return redirect()->route('paciente.index', auth()->user()->paciente);
    }
}
