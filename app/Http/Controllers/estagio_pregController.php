<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class estagio_pregController extends Controller
{
    //
    public function show(){
        $estagios = DB::collection('estagio')->get();


        return view('preg.termo_estagio', compact('estagios'));
    }

    public function validar_estagio(Request $request) {
        

        if ($request->radio == 'Aceitar') {
            DB::collection('estagio')->where('_id', $request->id)->update(['status' => 'ae']);
        }
        if ($request->radio == 'Rejeitar') {
            DB::collection('estagio')->where('_id', $request->id)->update(['status' => 'rp']);
        }
        
        $estagios = DB::collection('estagio')->get();
        
        return view('preg.termo_estagio', compact('estagios'));
    }
}
