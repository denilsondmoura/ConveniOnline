<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class nova_indicacaoController extends Controller
{

    public function abaAreas() {
        
        // filtra as empresas e recolhe as areas disponiveis em um vetor

        $aconhecimentos = DB::collection('aconhecimentos')->get();
        $convenios = DB::collection('convenios')->get();

        $areas = [];
        $usersDisponiveis = [];

        foreach ($convenios as $key => $convenio) {
            if ($convenio['status'] === 'd') {
                array_push($usersDisponiveis, $convenio['login']);
            }
        }

        foreach ($usersDisponiveis as $user) {
            foreach ($aconhecimentos as $key => $area) {
            
                if ($area['user'] === $user) {
                    
                    if (sizeof($areas) === 0) {
                        array_push($areas, $area['area']);
        
                    } else {
                        $repetido = false;
        
                        foreach ($areas as $a) {
        
                            if($area['area'] === $a){
                                $repetido = true;
                            }
                        }
        
                        if(!$repetido) {
                            array_push($areas, $area['area']);
                        }
                        
                    }
                }
            }  
        }
        

        return view('professor.nova_indicacao_areas', compact('areas'));
    }

   

    public function abaEmpresas (Request $request) {
        // session_start();

        $_SESSION["areaEstagio"] = $request->radio;

         // filtra os elementos do vetor pela area selecionada

        $aconhecimentos = DB::collection('aconhecimentos')->get();
        $convenios = DB::collection('convenios')->get();

        $usersOfertantes = [];
        $empresas = [];
        $conveniosDisponiveis = [];

        // Verifico os convenios ue foram deferidos
        foreach ($convenios as $key => $convenio) {
            if ($convenio['status'] === 'd') {
                array_push($conveniosDisponiveis, $convenio);
            }
        }

        // Verifico os usuarios que ofertam a area selecionada
        foreach ($aconhecimentos as $registro) {
            if ($registro['area'] === $_SESSION["areaEstagio"]) {

                if (sizeof($usersOfertantes) === 0) {
                    array_push($usersOfertantes, $registro['user']);

                } else {
                    $repetido = false;

                    foreach ($usersOfertantes as $u) {

                        if($registro['user'] === $u){
                            $repetido = true;
                        }
                    }

                    if(!$repetido) {
                        array_push($usersOfertantes, $registro['user']);
                    }
                    
                }
            }
            
        }

        foreach ($usersOfertantes as $user) {
            foreach ($conveniosDisponiveis as $convenio) {
             
                if ($user === $convenio['login'] ) {
                    array_push($empresas, $convenio['rsocial']);
                }
            }
        }


        return view('professor.nova_indicacao_empresas', compact('empresas'));
    }

    public function abaAlunos (Request $request) {
        $_SESSION["empresaEstagio"] = $request->radio;

        

        return view('professor.nova_indicacao_alunos');
    }

    public function abaTermo (Request $request) {
        $_SESSION["nomeAluno"] = $request->nome;
        $_SESSION["matAluno"] = $request->matricula;
        $_SESSION["emailAluno"] = $request->email;
        $info = [];

        array_push($info, $_SESSION["nomeAluno"]);
        array_push($info, $_SESSION["matAluno"]);
        array_push($info, $_SESSION["emailAluno"]);

        $logins = DB::collection('logins')->get();

        foreach ($logins as $key => $login) {
            if ($login["usuario"] === $_SESSION["user"]) {
                array_push($info, $login['nome']);
                $_SESSION["nomeProfessor"] = $login['nome'];
            }
        }

        return view('professor.nova_indicacao_termo', compact('info'));
    }

    public function confirmaTermo (Request $request) {
        DB::collection('estagio')->insert(
            ['nomeProfessor' =>  $_SESSION["nomeProfessor"],
             'nomeAluno' => $_SESSION["nomeAluno"],
             'matriculaAluno' => $_SESSION["matAluno"],
             'empresa' =>  $_SESSION["empresaEstagio"],
             'area' => $_SESSION["areaEstagio"],
             'supervisor' => "",
             'termo' => $request->termo,
             'status' => "ap",
             'data' => date('d-m-Y')]
        );

        $estagios = DB::collection('estagio')->get();
        $estagioId = null;

        foreach ($estagios as $key => $estagio) {
            if ($estagio['matriculaAluno'] == $_SESSION["matAluno"]) {
                $estagioId = $estagio['_id'];
            }
        }

        DB::collection('plano')->insert(
            ['idEstagio' => $estagioId,
             'notas' => -1,
             'status' => "a"] // a=aberto, f=finalizado, ap=aprovado
        );

        return redirect('\inicio_professor');
    }

    public function abaEmpresas2 () {
        
        $aconhecimentos = DB::collection('aconhecimentos')->get();
        $convenios = DB::collection('convenios')->get();

        $usersOfertantes = [];
        $empresas = [];
        $conveniosDisponiveis = [];

        // Verifico os convenios ue foram deferidos
        foreach ($convenios as $key => $convenio) {
            if ($convenio['status'] === 'd') {
                array_push($conveniosDisponiveis, $convenio);
            }
        }

        // Verifico os usuarios que ofertam a area selecionada
        foreach ($aconhecimentos as $registro) {
            if ($registro['area'] === $_SESSION["areaEstagio"]) {

                if (sizeof($usersOfertantes) === 0) {
                    array_push($usersOfertantes, $registro['user']);

                } else {
                    $repetido = false;

                    foreach ($usersOfertantes as $u) {

                        if($registro['user'] === $u){
                            $repetido = true;
                        }
                    }

                    if(!$repetido) {
                        array_push($usersOfertantes, $registro['user']);
                    }
                    
                }
            }
            
        }

        foreach ($usersOfertantes as $user) {
            foreach ($conveniosDisponiveis as $convenio) {
             
                if ($user === $convenio['login'] ) {
                    array_push($empresas, $convenio['rsocial']);
                }
            }
        }


        return view('professor.nova_indicacao_empresas', compact('empresas'));
    }

    public function abaAlunos2 () {
        

        return view('professor.nova_indicacao_alunos');
    }
}