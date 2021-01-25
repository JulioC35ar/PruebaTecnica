@extends('layouts.main')

@section('title', 'Index usuarios')

@section('content')
<div class="text-gray-900 bg-gray-200">
    <div class="p-4 flex">
        <h1 class="text-3xl">
            Usuarios
        </h1>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Nombre</th>
                    <th class="text-left p-3 px-5">Email</th>
                    <th class="text-left p-3 px-5">Rol</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($usuarios as $user) 
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 px-5">{{$user->name}}</td>
                    <td class="p-3 px-5">{{$user->email}}</td>
                    <td class="p-3 px-5">{{$user->rol}}</td>
                    <td class="p-3 px-5 flex justify-end">
                        
                        <a href="{{route('usuarios.edit',$user)}}">Editar</a>
                        /
                        <form action="{{route('usuarios.destroy', $user)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection