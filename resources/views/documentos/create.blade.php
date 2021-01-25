@extends('layouts.main')

@section('title', 'Crear usuario')

@section('content')
    <h1>Subir documento</h1>
    <form action="{{route('documentos.store')}}" method="POST">
        @csrf
        <label> 
            Nombre del documento: 
            <input type="text" name="name" value="{{old('name')}}">
        </label>
        @error('name')
            <br>
            <small>{{$message}}</small>
            <br>
        @enderror
        <label>
            Usuario ID
            <input type="text" name="usuarioId" value="{{old('usuarioId')}}">
        </label>
        @error('usuarioId')
            <br>
            <small>{{$message}}</small>
            <br>
        @enderror
        <button type="submit">Subir</button>
    </form>
@endsection