@extends('layouts.main')

@section('title', 'Index documentos')

@section('content')
    <h1>Index de documentos</h1>
    <a href="{{route('documentos.create')}}">Subir documento</a>
    <ul>
        @foreach ($documentos as $documento)
            <li>
                <a href="{{route('documentos.edit',$documento)}}">{{$documento->id}}</a>
                ->
                {{$documento->name}}
                ->
                <form action="{{route('documentos.destroy', $documento)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">Eliminar</button>
                </form>
            </li> 
        @endforeach
    </ul> 

    {{$documentos->links()}}

@endsection