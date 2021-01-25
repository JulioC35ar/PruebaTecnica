@extends('layouts.main')

@section('title', 'Nuevo usuario ')

@section('content')
    <!-- Root element for center items -->
    <div class="flex flex-col h-screen bg-gray-100">
        <!-- Card Container -->
        <div class="grid place-items-center mx-2 my-20 sm:my-auto">
            <!-- Card -->
            <div class="bg-white rounded-lg shadow-md lg:shadow-lg" style="width:500px; padding:50px">

                <!-- Card Title -->
                <h2 class="text-center font-semibold text-3xl lg:text-4xl text-gray-800">
                    Nuevo usuario
                </h2>

                <form action="{{route('usuarios.store')}}" class="mt-10" method="POST">
                    
                    @csrf

                    <!-- Name Input -->
                    <label for="name" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Nombre</label>
                    <input type="text" name="name" value="{{old('name')}}" placeholder="Nombre del usuario" id="name" placeholder="Nombre"
                        class="block w-full py-3 px-1 mt-2 mb-4
                        text-gray-800 appearance-none 
                        border-b-2 border-gray-100
                        focus:text-gray-500 focus:outline-none focus:border-gray-200"
                        required />

                    @error('name')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                    @enderror

                    <!-- Email Input -->
                    <label for="email" class="block text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                    <input type="text" name="email" value="{{old('email')}}" id="email" placeholder="Email"
                        class="block w-full py-3 px-1 mt-2 
                        text-gray-800 appearance-none 
                        border-b-2 border-gray-100
                        focus:text-gray-500 focus:outline-none focus:border-gray-200"
                        required />

                    @error('email')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                    @enderror
                    
                    <!-- Password Input -->
                    <label for="password" class="block text-xs font-semibold text-gray-600 uppercase">password</label>
                    <input type="password" name="password" value="" id="password" placeholder="password"
                        class="block w-full py-3 px-1 mt-2 
                        text-gray-800 appearance-none 
                        border-b-2 border-gray-100
                        focus:text-gray-500 focus:outline-none focus:border-gray-200"
                        required />

                    @error('email')
                        <br>
                        <small>*{{$message}}</small>
                        <br>
                    @enderror

                    <!-- Auth Buttton -->
                    <button type="submit"
                        class="w-full py-3 mt-10 bg-gray-800 rounded-sm
                        font-medium text-white uppercase
                        focus:outline-none hover:bg-gray-700 hover:shadow-none">
                        Crear
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection