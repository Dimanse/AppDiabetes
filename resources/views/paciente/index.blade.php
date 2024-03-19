@extends('layout.app')

@section('titulo')
    paciente
@endsection

@section('contenido')
    <div class="flex justify-center items-center mt-16 print:hidden">
        <img src="/img/bg_tita.png" alt="imagen tita" class="w-64 ">
    </div>
    <h2 class="text-indigo-500 text-center text-xl md:text-2xl mt-5 mb-5 font-extrabold uppercase"> {{$usuario->paciente}}</h2>
    <div class="flex justify-center items-center mb-5 print:hidden">
        <a href="{{ route('paciente.create', $usuario) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-5 py-1 rounded uppercase font-semibold ">Registra tu glucemia</a>
    </div>
    @if ($registros->count())
        <section class="w-11/12 grid md:grid-cols-2 lg:grid-cols-3 gap-4  border border-gray-200 shadow-xl mx-auto mt-10 p-3">

        @foreach ($registros as $registro)
        <div class=" mb-5 md:mb-0 border border-gray-300 p-3">
            <div class="flex justify-between items-center">
                <p class="text-gray-700 md:text-lg">Fecha: </p><span class="font-bold text-base" >{{ Carbon\Carbon::parse($registro->fecha)->format('d / m / Y') }}</span>
            </div>

            <div class="flex justify-between items-center">
                <p class="text-gray-700 md:text-lg">Hora: </p><span class="font-bold text-base" >{{$registro->hora}}</span>

            </div>

            <div class="flex justify-between items-center">
                <p class="text-gray-700 md:text-lg">Momento: </p><span class="font-bold text-base" >{{ $registro->momento }}</span>
            </div>

            <div class="flex justify-between items-center">
                <p class="text-gray-700 md:text-lg">Glucemia: </p> <span class="font-bold text-base @if ($registro->glucemia > 140)
                    text-red-600
                @else
                    text-green-600
                @endif" >{{ $registro->glucemia }} mg/dl</span>

            </div>

            <div class="flex justify-between items-center">
                <p class="text-gray-700 md:text-lg">Observaciones: </p><span class="font-bold text-base" >{{ $registro->observaciones }}</span>
            </div>



                <div class="mt-5 flex justify-between items-center gap-2 print:hidden">
                    <a href="{{ route('paciente.editar', $registro->id ) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer"> Editar</a>

                    <form method="POST" action="{{ route('paciente.destroy', $registro->id) }} " class="print:hidden">
                        @method('DELETE')   {{-- Se le conoce como method spoofing  el navegador solo reconoce get y post el método spoofing te permite agregar delete, put, putch... --}}
                        @csrf
                        <input
                            type="submit"
                            value="Eliminar"
                            class="bg-red-600 hover:bg-red-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer">
                    </form>
                </div>
            </div>

        </div>
        @endforeach

    </section>
    <div class="mt-10 mb-5 w-11/12 mx-auto print:hidden">
        {{$registros->links()}}
    </div>
    @else
        <section class="w-11/12   border border-gray-200 shadow-xl mx-auto mt-10 p-3">

                <h2 class="text-indigo-500 text-center text-xl md:text-2xl mt-5 mb-8 font-extrabold uppercase"> Aún no tienes registros</h2>

        </section>
    @endif



@endsection
