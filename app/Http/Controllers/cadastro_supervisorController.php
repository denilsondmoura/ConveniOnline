<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class cadastro_supervisorController extends Controller
{
    // Início do controller
    

    // Função cadastrar usuarios de empresas

    public function mostra_supervisores(){
        $dados = DB::collection('logins')->get();
        $supervisores = [];

        foreach ($dados as $dado) {
            if ($dado['tipo'] === 'super') {
                if ($dado['user_empr'] === $_SESSION['user']) {

                    array_push($supervisores, $dado);
                }
            } 
        }
        

        return view('empresa.supervisor', compact('supervisores'));
    }

    
    public function cadastro_supervisor(){  
        $aconhecimentos = DB::collection('aconhecimentos')->get();
        $aconhecimento = [];

        foreach ($aconhecimentos as $area) {

            if ($area['user'] === $_SESSION['user']) {
                array_push($aconhecimento, $area['area']);
            }
        }

        return view('empresa.cadastro_supervisor', compact('aconhecimento'));
    }

    
    public function cadastrar_supervisor(Request $dados) {

        $nome = $dados->nome;
        $email = $dados->email;
        $usuario = $dados->usuario;
        $senha = $dados->senha;
        $conf_senha = $dados->conf_senha;
        $area = $dados->area;
        
        $tipo = 'super';

        
        
        $dados_users = DB::collection('logins')->get();
        $existe = false;

        if (($nome && $usuario && $email && $senha && $tipo)) {
            
            foreach ($dados_users as $dado_user) {
                if ($dado_user['usuario'] === $usuario) {
                    $existe = true;
                } // Fim valida se usuario ja existe
            } // Fim foreach


            if ($existe === false) {
                
                if ($senha === $conf_senha) {

                    $usuarios = DB::collection('logins')->get(); 
                        foreach ($usuarios as $usuario) {
                            if ($usuario['usuario'] === $_SESSION['user']) {
                                $empresa = $usuario['empresa'];
                            }
                        }
                    
                    // session_start();
                    DB::collection('logins')->insert(
                        ['user_empr' => $_SESSION['user'],
                        'area' => $dados->area,
                        'nome' => $dados->nome,
                        'email' => $dados->email,
                        'usuario' => $dados->usuario,
                        'senha' => $dados->senha,
                        'tipo' => $tipo,
                        'empresa' => $empresa
                        ]
                        );
                        return redirect('/supervisores');
                        
                    }
                    else {return redirect('/cadastro_supervisor');}
                    
                }
                    
                else {return redirect('/cadastro_supervisor');}
                    
        } // Fim if verifica se todos campos foram preenchidos

        else {return redirect('/cadastro_supervisor');}
            
    } // Fim da função de cadastro da empresa




    
    // Fim do controller
}
