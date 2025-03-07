<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index(){
        $data['email'] = "Gustavo@teste.email.";
        return view('contato',$data);
    }
}
