<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicio_pregController extends Controller
{
    public function show() {
        return view('preg.inicio_preg');
    }
}
