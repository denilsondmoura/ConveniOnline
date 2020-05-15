<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicio_orientadorController extends Controller
{
    public function show() {
        return view('orientador.inicio_orientador');
    }
}
