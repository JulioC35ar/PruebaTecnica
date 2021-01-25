@extends('layouts.main')

@section('title', 'Index documentos')

@section('content')
    <div class="text-gray-900 bg-gray-200">
        <div class="p-4 flex">
            <h1 class="text-3xl">
                Documentos
                <a href="{{route('documentos.create')}}">+</i></a>
            </h1>
            <br>
        </div>
        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Nombre</th>
                        <th class="text-left p-3 px-5">Usuario</th>
                        <th class="text-left p-3 px-5">Ruta</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($documentos as $documento) 
                    <tr class="border-b hover:bg-orange-100 bg-gray-100">
                        <td class="p-3 px-5">{{$documento->name}}</td>
                        <td class="p-3 px-5">{{$usuarios->find($documento->usuarioId)->name}}</td>
                        <td class="p-3 px-5">{{$documento->file_path}}</td>
                        <td class="p-3 px-5 flex justify-end">
                            <a href="{{route('documentos.edit',$documento)}}">Editar</a>
                            /
                            <form action="{{route('documentos.destroy', $documento)}}" method="POST">
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
        {{$documentos->links()}}
    </div>
@endsection