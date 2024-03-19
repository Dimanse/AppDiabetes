@extends('layout.app')

@section('titulo')
    login
@endsection

@section('contenido')
    <h2 class="text-indigo-500 text-center text-2xl my-16 font-extrabold uppercase">Iniciar Sesión</h2>

    <section class="w-10/12 md:w-5/12 border border-gray-200 shadow-xl mx-auto">
        <form method="POST" action="{{ route('login') }}" novalidate class="p-5 bg-white">
            @csrf

            @if(session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }} </p>
            @endif


            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Tu Email de Registro"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}"
                />
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Password
                </label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password de Registro"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                />
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-5">
                <input type="checkbox" name="remember" id="">
                    <label class="text-gray-500 font-bold text-sm">
                        Mantener mi sesión abierta
                    </label>

            </div>



            <input
                type="submit"
                value="Iniciar Sesión"
                class="bg-indigo-500 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            />

            <div class="mt-5 flex justify-evenly items-center">
                <a href="{{ route('register') }}" class="text-sm text-indigo-500 hover:text-indigo-700">Registro</a>
                <a href="{{ route ('password')}}" class="text-sm text-indigo-500 hover:text-indigo-700">Cambiar password</a>
            </div>

        </form>

    </section>

@endsection
