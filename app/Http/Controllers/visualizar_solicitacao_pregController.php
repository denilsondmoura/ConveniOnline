<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class visualizar_solicitacao_pregController extends Controller
{

    public function mostra_solicitacoes() {

        $dados = DB::collection('convenios')->get();   

        return view('preg.visualizar_solicitacao_preg', compact('dados'));
    
    }


    public function indeferir(Request $dados) {

        DB::collection('convenios')->where('_id', $dados->id)->update(['status' => 'i']);
        DB::collection('convenios')->where('_id', $dados->id)->update(['observacao' => $dados->modal_input]);

        return redirect('/visualizar_solicitacao');
    }

    public function deferir($id) {

        DB::collection('convenios')->where('_id', $id)->update(['status' => 'd']);

        return redirect('/visualizar_solicitacao');
    
    }



    

    

}// Fim controller
