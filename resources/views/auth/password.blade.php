@extends('layout.app')

@section('titulo')
    Cambiar Password
@endsection

@section('contenido')
    <h2 class="text-indigo-500 text-center text-xl md:text-2xl mt-8 mb-16 font-extrabold uppercase"> Cambia tu password</h2>

    <section class="w-10/12 md:w-5/12 border border-gray-200 shadow-xl mx-auto">
        <form method="POST" action="{{ route('password') }}" novalidate class="p-5 bg-white">
            @csrf

            @if(session('error'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('error') }} </p>
            @endif
            @if(session('exito'))
                <p class="bg-green-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('exito') }} </p>
            @endif


            <div class="mb-5">
                <label for="new_password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nuevo Password
                </label>
                <input
                    id="new_password"
                    name="new_password"
                    type="password"
                    placeholder="Introduce tu nuevo password"
                    class="border p-3 w-full rounded-lg @error('new_password') border-red-500 @enderror"
                />
                @error('new_password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="confirm_password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Confirma tu password
                </label>
                <input
                    id="confirm_password"
                    name="confirm_password"
                    type="password"
                    placeholder="Repite tu nuevo password"
                    class="border p-3 w-full rounded-lg @error('confirm_password') border-red-500 @enderror"
                />
                @error('confirm_password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>





            <input
                type="submit"
                value="Guardar Cambios"
                class="bg-indigo-500 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            />

            <div class="mt-5 flex justify-evenly items-center">
                <a href="{{ route('login') }}" class="text-sm text-indigo-500 hover:text-indigo-700">Inicia Sesión</a>
                <a href="{{ route ('register')}}" class="text-sm text-indigo-500 hover:text-indigo-700">Crear cuenta</a>
            </div>

        </form>

    </section>
@endsection
