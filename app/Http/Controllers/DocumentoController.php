<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentos;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;
use RealRashid\SweetAlert\Facades\Alert;

class DocumentoController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        $documentos = Documento::orderBy('id', 'desc')->paginate();
        return view('documentos.index', compact('documentos', 'usuarios'));
    }

    public function create(){
        $usuarios = User::all();
        return view('documentos.create', compact('usuarios'));
    }

    public function store(Request $request){

        $request->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpg,jpng|max:2048'
            ]);
        
        $fileModel = new Documento;

        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name =  $request->name;
            $fileModel->usuarioId = $request->user_id;
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return redirect()->route('documentos.index');
        }
    }

    public function edit(Documento $documento){
        $usuarios = User::all();
        $used_id = $documento->usuarioId;
        
        return view('documentos.edit', compact('documento', 'usuarios', 'used_id'));
    }

    public function update(Request $request, Documento $documento){

        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $documento->name =  $request->name;
            $documento->usuarioId = $request->user_id;
            $documento->file_path = '/storage/' . $filePath;
            $documento->save();

            Alert::success('Usuario cambiado correctamente', 'Success Message');
            return redirect()->route('documentos.index');
        }else{
            $documento->name =  $request->name;
            $documento->usuarioId =  $request->user_id;
            $documento->save();
            return redirect()->route('documentos.index');
        }
    }

    public function destroy(Documento $documento){
        $documento->delete();
        return redirect()->route('documentos.index');
    }
}
