<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    //
    public function index()
    {
        return view('auth.password');
    }

    public function store(Request $request)
    {
        $request->validate([

            'new_password' => 'required|min:6',

        ]);

        $usuario = User::find(auth()->user()->id);

        if($request->input('new_password') === $request->input('confirm_password')) {
            $usuario->password = Hash::make($request->new_password);
            $usuario->save();
            return back()->with('exito', 'Nuevo password guardado con exito');
        }else{
            return back()->with('error', 'Las contraseñas no coinciden');
        }
    }
}
