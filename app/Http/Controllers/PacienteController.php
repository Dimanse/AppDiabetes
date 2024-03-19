<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    //
    public function index()
    {
        $usuario = User::find(auth()->user()->id);
        $usuario->paciente = str_replace("-"," ",$usuario->paciente);

        $registros = DB::table('registros')
        ->where('user_id', $usuario->id)
        ->latest('fecha')->latest('hora')->paginate(9);

        // foreach($registros as $registro){
        //     $date = $registro->created_at;
        //     $date = Carbon::parse($date); // now date is a carbon instance
        //     $elapsed = $date->diffForHumans();
        // }
        // dd($registros);

        return view('paciente.index', [
            'usuario'=> $usuario,
            'registros' => $registros,
            // 'elapsed' => $elapsed,

        ]);
    }

    public function create()
    {
        // dd('Accediendo a registro');
        $usuario = User::find(auth()->user()->id);


        // dd($usuario);
        return view('paciente.create',[
            'usuario' => $usuario,
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'momento' => 'required',
            'glucemia' => 'required',
        ]);

        Registro::create([

                  'fecha' => $request->fecha,
                  'hora' => $request->hora,
                  'momento' => $request->momento,
                  'glucemia' => $request->glucemia,
                  'observaciones' => $request->observaciones ?? '',
                  'user_id' => auth()->user()->id,
              ]);



              return redirect()->route('paciente.index', auth()->user()->paciente);
    }

    public function edit(Registro $registro)
    {
        $usuario = User::find(auth()->user()->id);
        $registro = Registro::find($registro->id);


        return view('paciente.editar', [
            'usuario' => $usuario,
            'registro' => $registro,
        ]);
    }

    public function update(Request $request, Registro $registro)
    {

        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'momento' => 'required',
            'glucemia' => 'required',
        ]);

        $registro->fecha = $request->fecha;
        $registro->hora = $request->hora;
        $registro->momento = $request->momento;
        $registro->glucemia = $request->glucemia;
        $registro->observaciones = $request->observaciones ?? ' ';
        $registro->save();

        return redirect()->route('paciente.index', auth()->user()->paciente);

        // dd($registro);




    }




    public function destroy(Registro $registro)
    {
        // dd($registro->id);
        if ($registro->user_id === auth()->user()->id){
            $registro->delete();
            return redirect()->route('paciente.index', auth()->user()->paciente);
        }
    }
}
