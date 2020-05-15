<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class cadastro_usuarioController extends Controller
{
    // Início do controller
    

    // Função cadastrar usuarios de empresas

    public function mostra_usuarios(){
        $dados = DB::collection('logins')->get();   
        return view('preg.usuarios', compact('dados'));
    }

    
    public function cadastro_usuario(){  
        return view('preg.cadastro_usuario');
    }

    
    public function cadastro_empresa(Request $dados) {

        $nome = $dados->nome;
        $email = $dados->email;
        $usuario = $dados->usuario;
        $senha = $dados->senha;
        $conf_senha = $dados->conf_senha;
        $tipo = 'empr';

        
        
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
                    DB::collection('logins')->insert(
                            ['nome' => $dados->nome,
                            'email' => $dados->email,
                            'usuario' => $dados->usuario,
                            'senha' => $dados->senha,
                            'tipo' => $tipo,
                            'empresa' => ''
                            ]
                        );
                        return redirect('/login');
                        
                    }
                    else {return redirect('/cadastro');}
                    
                }
                    
                else {return redirect('/cadastro');}
                    
        } // Fim if verifica se todos campos foram preenchidos

        else {return redirect('/cadastro');}
            
    } // Fim da função de cadastro da empresa




    // Função para cadastro de qualquer usuário

    public function cadastrar_usuario(Request $dados) {

        $nome = $dados->nome;
        $email = $dados->email;
        $usuario = $dados->usuario;
        $senha = $dados->senha;
        $conf_senha = $dados->conf_senha;
        $tipo = $dados->tipo;

        
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
                    DB::collection('logins')->insert(
                        ['nome' => $dados->nome,
                        'email' => $dados->email,
                        'usuario' => $dados->usuario,
                        'senha' => $dados->senha,
                        'tipo' => $dados->tipo,
                        'empresa' => ''
                        ]
                    );
        
                    return redirect('/usuarios');

                }
                else {return redirect('/cadastro_usuario');}

            } // Fim valida se usuário já existe

        } // Fim valida se todos campos foram preenchidos

        else {return redirect('/cadastro_usuario');}

    } // Fim da função de cadastro de todos usuários
    
















    // Fim do controller
}
