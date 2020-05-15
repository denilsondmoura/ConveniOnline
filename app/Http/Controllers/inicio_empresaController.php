<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class inicio_empresaController extends Controller
{
    public function show() {

        $convenios = DB::collection('convenios')->get();

            foreach ($convenios as $key => $convenio) {
                if ($convenio['login'] === $_SESSION["user"]) {
                    
                    $_SESSION["empresaEstagio"] = $convenio['rsocial']; 
                    
                    if ($convenio['status'] === 'd') {

                        $_SESSION["conveniado"] = true;
                    }
                }
              
            }

        return view('empresa.inicio_empresa');
    }
}
