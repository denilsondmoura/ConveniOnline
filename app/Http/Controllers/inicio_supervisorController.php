<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicio_supervisorController extends Controller
{
    public function show() {
        return view('supervisor.inicio_supervisor');
    }
}
