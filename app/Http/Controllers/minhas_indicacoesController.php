<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class minhas_indicacoesController extends Controller
{

    public function show() {

        $estagios = DB::collection('estagio')->get();
        $meusEstagios = [];

        foreach ($estagios as $key => $estagio) {


            if ($estagio['nomeProfessor'] === $_SESSION["nomeProfessor"]) {

                // echo $estagio['nomeProfessor'];
                array_push($meusEstagios, $estagio);
            }
        }
        

        // return var_dump($meusEstagios);
    
        return view('professor.minhas_indicacoes', compact('meusEstagios'));
    }

    public function verPlano(Request $form) {
        
        $planos = DB::collection('plano')->get();
        $planoAtual = null;
        $finded = false;

        foreach ($planos as $key => $plano) {
            if ($plano['idEstagio'] == $form->id) {
                $finded = true;
                $planoAtual = $plano;
            }
        }

        if (!$finded) {
            return view('professor.plano_estagio_not_found');
        }

        $estagios = DB::collection('estagio')->get();
        $nomeEstagiario = null;

        foreach ($estagios as $key => $estagio) {
            if ($estagio['_id'] == $form->id) {
                $nomeEstagiario = $estagio['nomeAluno'];
            }
        }

        $atividades = DB::collection('atividade')->get();
        $minhasAtividades = [];

        foreach ($atividades as $key => $atividade) {
            if ($atividade['idPlano'] == $planoAtual['_id']) {
                array_push($minhasAtividades, $atividade);
            }
        }

        return view('professor.planos_professor', compact('planoAtual', 'nomeEstagiario', 'minhasAtividades'));
        
    }

    public function verFrequencia() {

        return view('professor.frequencia_estagio_not_found');
    }
    
}