@extends('templates.moldura_empresa')
@section('content')

<link rel='stylesheet' type='text/css' media='screen' href='./css/empresa/cadastro_supervisor.css'>

<div class="solicitacao">

    <form method="POST" action="cadastrar_supervisor">
        {{csrf_field() }}

    <div class="form-title-solicitacao">
            Cadastro de supervisores
    </div>

    <div class="form-solicitacao">

        <div class="form-fields-solicitacao"></div>
            
            <div>
                <div class="l-side">Nome:</div> 
                <div class="r-side"><input class="input-solicitacao" type="text" name="nome" autofocus required></div>
            </div>
            
            <div>
                <div class="l-side">E-mail:</div> 
                <div class="r-side"><input class="input-solicitacao" type="text" name="email" required ></div>
            </div>
            
            <div>
                <div class="l-side">Usuário:</div> 
                <div class="r-side"><input class="input-solicitacao" type="text" name="usuario" required></div>
            </div>

            <div>
                <div class="l-side">Senha:</div> 
                <div class="r-side"><input class="input-solicitacao" type="password" name="senha" required></div>
            </div>
            
            <div>
                <div class="l-side">Confirme a senha:</div> 
                <div class="r-side"><input class="input-solicitacao" type="password" name="conf_senha" required></div>
            </div>

            <div>
                <div class="l-side">Áreas de interesse:</div> 
                <div class="r-side">
           
                <!-- <input class="input-solicitacao" type="text" name="aconhecimento" required > -->
                    <div class="drop_down" onmouseover="mostrarDD()" onmouseout="ocultarDD()"> Selecione as áreas para estágio...
                        <div class="options">
                            <ul>
                            @php
                              $i = 1;
                            @endphp
                            
                            @foreach ($aconhecimento as $area)
                            
                                <li>
                                    <input id="{{ $area }}" type="radio" name="area" value="{{ $area }}" required>
                                    <label for="{{ $area }}">{{ $area }}</label>
                                </li>

                            @endforeach
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            <script type="text/javascript"src="js/cadastro_supervisor.js"></script> 


            <div class="end-solicitacao"></div>
                
            <div class="form-fields-solicitacao"></div>
    
            <input class="form-submit" type="submit" value="Salvar">
            
        </div>
    </form>

</div>
        
@endsection
