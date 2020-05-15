<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicio_professorController extends Controller
{
    public function show(){

        $_SESSION["areaEstagio"] = '';
        $_SESSION["empresaEstagio"] = '';
        $_SESSION["nomeAluno"] = '';
        $_SESSION["matAluno"] = '';
        $_SESSION["emailAluno"] = '';


        return view('professor.inicio_professor');
    }

}

