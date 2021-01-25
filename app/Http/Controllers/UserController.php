<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function welcome(){
        return view('dashboard');
    }

    public function index(){
        $usuarios = User::orderBy('id', 'desc')->paginate();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create(){
        return view('usuarios.create');
    }

    public function store(Request $request){

        $user = User::create($request->all());

        return redirect()->route('usuarios.index');
    }

    public function edit(User $user){
        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        //$user -> update($request->all());
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> rol = $request -> rol;
        $user -> save();
        
        return redirect()->route('usuarios.index');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('usuarios.index');
    }
}
