<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentos;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::orderBy('id', 'desc')->paginate();
        return view('documentos.index', compact('documentos'));
    }

    public function create(){
        return view('documentos.create');
    }

    public function edit(Documento $documento){
        return view('documentos.edit', compact('documento'));
    }

    public function update(Request $request, Documento $documento){
        $documento -> update($request->all());
        return redirect()->route('documentos.index');
    }

    public function store(StoreDocumentos $request){

        $documento = Documento::create($request->all());

        return redirect()->route('documentos.index');
    }

    public function destroy(Documento $documento){
        $documento->delete();
        return redirect()->route('documentos.index');
    }


}
