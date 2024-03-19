@extends('layout.app')

@section('titulo')
    Registrate
@endsection

@section('contenido')
<h2 class="text-indigo-500 text-center text-2xl my-16 font-extrabold uppercase">Crea tu propia cuenta</h2>

<section class="w-10/12 md:w-5/12 border border-gray-200 shadow-xl mx-auto">
    <form method="POST" action="{{ route('register') }}" novalidate class="p-5 bg-white">
        @csrf

        @if(session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }} </p>
        @endif


        <div class="mb-5">
            <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                Nombre
            </label>
            <input
                id="name"
                name="name"
                type="text"
                placeholder="Tu Nombre"
                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                value="{{ old('name') }}"
            />
            @error('name')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="paciente" class="mb-2 block uppercase text-gray-500 font-bold">
                Nombre completo del paciente
            </label>
            <input
                id="paciente"
                name="paciente"
                type="text"
                placeholder="Nombre del paciente"
                class="border p-3 w-full rounded-lg @error('paciente') border-red-500 @enderror"
                value="{{ old('paciente') }}"
            />
            @error('paciente')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
            @enderror
        </div>
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
            <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                Repetir password
            </label>
            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                placeholder="Confirma tu password"
                class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror"
            />
            @error('password_confirmation')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
            @enderror
        </div>





        <input
            type="submit"
            value="Crear cuenta"
            class="bg-indigo-500 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        />

        <div class="mt-5 flex justify-evenly items-center">
            <a href="{{ route('login') }}" class="text-sm text-indigo-500 hover:text-indigo-700">Inicia Sesión</a>
            <a href="{{ route('password') }}" class="text-sm text-indigo-500 hover:text-indigo-700">Cambiar password</a>
        </div>

    </form>

</section>
@endsection
