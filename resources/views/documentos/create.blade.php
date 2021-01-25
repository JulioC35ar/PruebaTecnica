@extends('layouts.main')

@section('title', 'Nuevo documento')

@section('content')
    <!-- Root element for center items -->
    <div class="flex flex-col h-screen bg-gray-100">
        <!-- Card Container -->
        <div class="grid place-items-center mx-2 my-20 sm:my-auto">
            <!-- Card -->
            <div class="bg-white rounded-lg shadow-md lg:shadow-lg" style="width:500px; padding:50px">

                <!-- Card Title -->
                <h2 class="text-center font-semibold text-3xl lg:text-4xl text-gray-800">
                    Nuevo documento
                </h2>

                <form action="{{route('documentos.store')}}" class="mt-10" method="POST" enctype="multipart/form-data">
                    
                    @csrf

                    <!-- Name Input -->
                    <label for="name" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Nombre</label>
                    <input type="text" name="name" value="{{old('name')}}" placeholder="Nombre del documento" id="name" placeholder="Nombre"
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

                    <!-- usuarioId Input -->
                    <label for="user_id" class="block text-xs font-semibold text-gray-600 uppercase">Usuario</label>
                    <select class="form-control" name="user_id" required>

                        <option>Seleccione usuario</option>
                    
                        @foreach ($usuarios as $user)
                    
                            <option value="{{ $user->id }}"> 
                    
                                {{ $user->name }} 
                    
                            </option>
                    
                        @endforeach    
                    
                    </select>                
                    
                    <!-- file Input -->
                    <label class="block text-xs font-semibold text-gray-600 uppercase" for="chooseFile" style="margin-top: 20px">Seleccione un archivo</label>
                    <input type="file" name="file" id="chooseFile"
                    class="block w-full py-3 px-1 mt-2 
                    text-gray-800 appearance-none 
                    border-b-2 border-gray-100
                    focus:text-gray-500 focus:outline-none focus:border-gray-200"
                    required />

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