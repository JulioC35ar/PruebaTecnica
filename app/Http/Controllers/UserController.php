<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('usuarios.index');
    }

    public function create(){
        return view('usuarios.create');
    }

    public function edit($user){
        return view('usuarios.edit', compact('user'));
    }
}
