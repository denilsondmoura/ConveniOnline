<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class convenio_solicitacaoController extends Controller
{

    public function validar() {
        // session_start();
        $convenios = DB::collection('convenios')->get();
        $finded = false;
        foreach ($convenios as $convenio) {
            if ($convenio['login'] === $_SESSION["user"]) {
                
                $finded = true;
            } else {
                
                $finded = false;
            }
        }
        if ($finded){
            return redirect('ver_solicitacao');
          
        } else {

            return redirect('/solicitacao');
        }
        
    }

    public function show() {
        $aconhecimento = [
            'Suporte técnico',
            'Desenvolvimento',
            'Contábeis',
            'Designer',
            'Culinária',
            'Engenharia elétrica',
            'Arquitetura',
            'Análise de dados'
        ];
        return view('empresa.convenio_solicitacao', compact('aconhecimento'));
    }

    public function ver_solicitacao() {
        $dados_convenios = DB::collection('convenios')->get();
        $aconhecimentos = DB::collection('aconhecimentos')->get();
        $areas = [];
        $convenio = 0;
        // ;session_start()
        foreach ($dados_convenios as $dados) {

            if ($dados['login'] === $_SESSION['user']) {
                $convenio = $dados;
            }
        }

        foreach ($aconhecimentos as $area) {

            if ($area['user'] === $_SESSION['user']) {
                array_push($areas, $area['area']);
            }
        }
        array_push($convenio, $areas);


        return view('empresa.status_solicitacao_empresa', compact('convenio'));
    }

    public function enviar_solicitacao(Request $dados) {
        $areas = [];
        foreach ($dados->ckb as $dado) {
            array_push($areas, $dado);
        }


        $representante = $dados->representante;
        $rsocial = $dados->rsocial;
        $cnpj = $dados->cnpj;
        $ie = $dados->ie;
        $endereco = $dados->endereco;
        $cep = $dados->cep;
        $contato = $dados->contato;
        $aconhecimento = $areas;

        if (($representante && $rsocial && $cnpj && $ie && $endereco && $cep && $contato)) {
            // session_start();
            DB::collection('convenios')->insert(
                ['login' => $_SESSION["user"],
                 'representante' => $dados->representante,
                 'rsocial' => $dados->rsocial,
                 'cnpj' => $dados->cnpj,
                 'ie' => $dados->ie,
                 'endereco' => $dados->endereco,
                 'cep' => $dados->cep,
                 'contato' => $dados->contato,
                 'status' => 'a',
                 'observacao' => '',
                 'data' => date('d-m-Y')]
            );

            DB::collection('logins')->where('usuario', $_SESSION['user'])->update(
                ['empresa' => $dados->rsocial]
                );

            foreach ($areas as $area) {
                
                DB::collection('aconhecimentos')->insert([
                    'user' => $_SESSION["user"],
                    'area' => $area
                ]);
            }
            

            // echo "Solicitação enviada com sucesso!";
            
            return redirect('/inicio_empresa');
            
        } else {
        
            redirect('/solicitacao');
        }

    }

} //Fim do controller
