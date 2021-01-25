@extends('layouts.main')

@section('title', 'Editar documento')

@section('content')
    <h1>Editar documento</h1>
    <form action="{{route('documentos.update', $documento)}}" method="post">
        @csrf
        @method('put')
        <label> 
            Nombre del documento: 
            <input type="text" name="name" value="{{old('name', $documento->name)}}">
        </label>

        @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <label>
            Usuario ID
            <input type="text" name="usuarioId" value="{{old('usuarioId', $documento->usuarioId)}}">
        </label>

        @error('usuarioId')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <button type="submit">Actualizar</button>
    </form>
@endsection