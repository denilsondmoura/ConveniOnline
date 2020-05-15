<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rota para o controller "ConvenioControlller" na função login

use Illuminate\Support\Facades\Route;

// ROTAS PARA QUEM NÃO ESTA LOGADO
    Route::get('login', 'loginController@show');
    Route::post('logar', 'loginController@logar');

    Route::get('cadastro', 'loginController@cadastro');
    Route::post('cadastro_empresa', 'cadastro_usuarioController@cadastro_empresa');

    

// ROTAS PARA QUEM ESTA LOGADO
    // ROTAS REFERENTES A PREG
        // ABA INICIO
            Route::get('inicio_preg', 'inicio_pregController@show')->middleware('checkPreg');

        // ABA SOLICITAÇÕES
            Route::get('visualizar_solicitacao', 'visualizar_solicitacao_pregController@mostra_solicitacoes')->middleware('checkPreg');
            Route::get('deferir/{id}', 'visualizar_solicitacao_pregController@deferir')->middleware('checkPreg');
            Route::post('indeferir', 'visualizar_solicitacao_pregController@indeferir')->middleware('checkPreg');

        // ABA USUÁRIOS
            Route::get('usuarios', 'cadastro_usuarioController@mostra_usuarios')->middleware('checkPreg');
            Route::get('cadastro_usuario', 'cadastro_usuarioController@cadastro_usuario')->middleware('checkPreg');
            Route::post('cadastrar_usuario', 'cadastro_usuarioController@cadastrar_usuario')->middleware('checkPreg');
        //ABA ESTAGIO
            //LISTA TERMOS DE ESTAGIO
            Route::get('preg_estagio','estagio_pregController@show')->middleware('checkPreg');
            Route::post('validar_estagio','estagio_pregController@validar_estagio')->middleware('checkPreg');
            

            



    // ROTAS REFERENTES A EMPRESAS 
        // ABA INICIO
            Route::get('inicio_empresa', 'inicio_empresaController@show')->middleware('checkEmpresa');

        // ABA CONVÊNIO
            // ANTES DE SOLICITADO
                Route::get('solicitacao', 'convenio_solicitacaoController@show')->middleware('checkEmpresa');
                Route::post('enviar_solicitacao', 'convenio_solicitacaoController@enviar_solicitacao')->middleware('checkEmpresa');

            // APÓS SOLICITADO
                Route::get('validar', 'convenio_solicitacaoController@validar')->middleware('checkEmpresa');
                Route::get('ver_solicitacao', 'convenio_solicitacaoController@ver_solicitacao')->middleware('checkEmpresa');

            // NÃO UTILIZADO
                Route::get('detalhe_solicitacao', 'detalhe_solicitacaoController@show');
        //ABA ESTAGIO
            //LISTA TERMOS DE ESTAGIO
                Route::get('estagios','validar_estagioController@show')->middleware('checkEmpresa');
                Route::post('validar_estagio_empresa','validar_estagioController@validar_estagio')->middleware('checkEmpresa');

    
    
    
    // ROTAS REFERENTES A PROFESSORES
        // ABA INICIO
            Route::get('inicio_professor', 'inicio_professorController@show')->middleware('checkProfessor');
        
        // ABA MINHAS INDICAÇÕES
            Route::get('minhas_indicacoes', 'minhas_indicacoesController@show')->middleware('checkProfessor');
            Route::post('plano_estagio', 'minhas_indicacoesController@verPlano')->middleware('checkProfessor');
            Route::post('frequencia_estagio', 'minhas_indicacoesController@verFrequencia')->middleware('checkProfessor');

        // ABA NOVA INDICAÇÃO
            
            Route::get('nova_indicacao_areas', 'nova_indicacaoController@abaAreas')->middleware('checkProfessor');
            Route::post('nova_indicacao_empresas', 'nova_indicacaoController@abaEmpresas')->middleware('checkProfessor');
            Route::get('nova_indicacao_empresas2', 'nova_indicacaoController@abaEmpresas2')->middleware('checkProfessor');
            Route::post('nova_indicacao_alunos', 'nova_indicacaoController@abaAlunos')->middleware('checkProfessor');
            Route::get('nova_indicacao_alunos2', 'nova_indicacaoController@abaAlunos2')->middleware('checkProfessor');
            Route::post('nova_indicacao_termo', 'nova_indicacaoController@abaTermo')->middleware('checkProfessor');
            Route::post('confirma_termo', 'nova_indicacaoController@confirmaTermo')->middleware('checkProfessor');


            

        
    // ROTAS REFERENTES A SUPERVISOR
        // ABA INICIO
            Route::get('inicio_supervisor', 'inicio_supervisorController@show')->middleware('checkSupervisor');
        // ABA  SUPERVISIONAR
            Route::get('supervisionar', 'estagiariosController@show')->middleware('checkSupervisor');

            // PLANO DE ESTAGIO
                Route::post('aluno_plano', 'estagiariosController@aluno_plano')->middleware('checkSupervisor');
                Route::post('att_plano', 'estagiariosController@att_plano')->middleware('checkSupervisor');
                Route::post('att_plano_nota', 'estagiariosController@att_plano_nota')->middleware('checkSupervisor');

                
                

            // FREQUENCIA
                Route::post('aluno_frequencia', 'estagiariosController@aluno_frequencia')->middleware('checkSupervisor');
                Route::post('salvar_frequencia', 'estagiariosController@salvar_frequencia')->middleware('checkSupervisor');
        
        // ABA SUPERVISORES
            Route::get('supervisores', 'cadastro_supervisorController@mostra_supervisores')->middleware('checkEmpresa');
            Route::get('cadastro_supervisor', 'cadastro_supervisorController@cadastro_supervisor')->middleware('checkEmpresa');
            Route::post('cadastrar_supervisor', 'cadastro_supervisorController@cadastrar_supervisor')->middleware('checkEmpresa');

        

        // ABA SOLICITAÇÕES
            // Route::get('visualizar_solicitacao', 'visualizar_solicitacao_pregController@mostra_solicitacoes')->middleware('checkPreg');
            // Route::get('deferir/{id}', 'visualizar_solicitacao_pregController@deferir')->middleware('checkPreg');
            // Route::post('indeferir', 'visualizar_solicitacao_pregController@indeferir')->middleware('checkPreg');

        // ABA USUÁRIOS
            // Route::get('usuarios', 'cadastro_usuarioController@mostra_usuarios')->middleware('checkProfessor');
            // Route::get('cadastro_usuario', 'cadastro_usuarioController@cadastro_usuario')->middleware('checkProfessor');
            // Route::post('cadastrar_usuario', 'cadastro_usuarioController@cadastrar_usuario')->middleware('checkProfessor');
    

