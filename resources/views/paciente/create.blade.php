@extends('layout.app')

@section('titulo')
    Registra tu glucemia
@endsection

@section('contenido')
<h2 class="text-indigo-500 text-center text-xl md:text-2xl mt-8 mb-16 font-extrabold uppercase"> Registra tus gluicemias</h2>

<section class="w-10/12 md:w-5/12 border border-gray-200 shadow-xl mx-auto">
    <form method="POST" action="{{ route('paciente.store', $usuario) }}" novalidate class="p-5 bg-white">
        @csrf

        @if(session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }} </p>
        @endif

        <div class="my-5 flex justify-end">
            <div class="flex gap-3 items-center justify-between">
                <a href="{{ route('paciente.index', $usuario) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer ">Volver</a>
            </div>
        </div>


        <div class="mb-5">
            <label for="fecha" class="mb-2 block uppercase text-gray-500 font-bold">
                Fecha:
            </label>
            <input
                id="fecha"
                name="fecha"
                type="date"
                placeholder="Fecha de la medición"
                class="border p-3 w-full rounded-lg @error('fecha') border-red-500 @enderror"
                value="{{ old('fecha') }}"
            />
            @error('fecha')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="Hora" class="mb-2 block uppercase text-gray-500 font-bold">
                Hora
            </label>
            <input
                id="hora"
                name="hora"
                type="time"
                placeholder="Hora de la medición"
                class="border p-3 w-full rounded-lg @error('hora') border-red-500 @enderror"
                value="{{ old('hora') }}"
            />
            @error('hora')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
            @enderror
        </div>


            <div>
                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="levantarse" class="uppercase text-gray-500 font-bold ">
                        Al levantarse
                    </label>
                    <input
                        type="radio"
                        id="levantarse"
                        name="momento"

                        value="Al levantarse"

                    />


                </div>
                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="antes desayuno" class="uppercase text-gray-500 font-bold ">
                        Antes de desayunar
                    </label>
                    <input
                        type="radio"
                        id="antes desayuno"
                        name="momento"

                        value="antes de desayunar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="despues desayuno" class="uppercase text-gray-500 font-bold ">
                        2 horas después de desayunar
                    </label>
                    <input
                        type="radio"
                        id="despues desayuno"
                        name="momento"

                        value="2 horas después de desayunar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="antes almuerzo" class="uppercase text-gray-500 font-bold ">
                        Antes de almorzar
                    </label>
                    <input
                        type="radio"
                        id="antes almuerzo"
                        name="momento"

                        value="antes de almorzar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="despues almuerzo" class="uppercase text-gray-500 font-bold ">
                        2 horas después de almorzar
                    </label>
                    <input
                        type="radio"
                        id="despues almuerzo"
                        name="momento"

                        value="2 horas después de almorzar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="antes cenar" class="uppercase text-gray-500 font-bold ">
                        Antes de cenar
                    </label>
                    <input
                        type="radio"
                        id="antes cenar"
                        name="momento"

                        value="Antes de cenar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="despues cenar" class="uppercase text-gray-500 font-bold ">
                        2 horas después de cenar
                    </label>
                    <input
                        type="radio"
                        id="despues cenar"
                        name="momento"

                        value="2 horas después de cenar"

                    />


                </div>

                <div class="mb-3 flex justify-between text-sm md:text-base items-center">
                    <label for="acostarse" class="uppercase text-gray-500 font-bold ">
                        Al acostarse
                    </label>
                    <input
                        type="radio"
                        id="acostarse"
                        name="momento"

                        value="Al acostarse"

                    />

                </div>
                @error('momento')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-5">
            <label for="glucemia" class="mb-2 block uppercase text-gray-500 font-bold">
                Glucemía
            </label>
            <input
                id="glucemia"
                name="glucemia"
                type="number"
                placeholder="Escribe el resultado de tu glucemia"
                class="border p-3 w-full rounded-lg @error('glucemia') border-red-500 @enderror"
                value="{{ old('glucemia')}}"
            />
            @error('glucemia')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="observaciones" class="mb-2 block uppercase text-gray-500 font-bold">
                Observaciones
            </label>
            <input
                id="observaciones"
                name="observaciones"
                type="text"
                placeholder="Ej.: tubo un disgusto, ceno pizza, almorzo más cantidad"
                class="border p-3 w-full rounded-lg @error('observaciones') border-red-500 @enderror"
                value="{{ old('observaciones')}}"
            />
            @error('observaciones')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
            @enderror
        </div>





        <input
            type="submit"
            value="Registrar Glucemia"
            class="bg-indigo-500 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        />



    </form>

</section>
@endsection
