<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class validar_estagioController extends Controller
{
    public function show() {
        $estagios = DB::collection('estagio')->get();
        $meusEstagios = [];

        foreach ($estagios as $key => $estagio) {
            if ($estagio['empresa'] === $_SESSION["empresaEstagio"]) { 
                array_push($meusEstagios, $estagio);
            }
        }   

        return view('empresa.validar_estagio', compact('meusEstagios'));
    }

    public function validar_estagio(Request $request) {
        

        if ($request->radio == 'Aceitar') {
            DB::collection('estagio')->where('_id', $request->id)->update(['status' => 'a']);
        }
        if ($request->radio == 'Rejeitar') {
            DB::collection('estagio')->where('_id', $request->id)->update(['status' => 're']);
        }
        
        $estagios = DB::collection('estagio')->get();
        $meusEstagios = [];

        foreach ($estagios as $key => $estagio) {
            if ($estagio['empresa'] === $_SESSION["empresaEstagio"]) { 
                array_push($meusEstagios, $estagio);
            }
        }   
        
        return view('empresa.validar_estagio', compact('meusEstagios'));
    }
}
