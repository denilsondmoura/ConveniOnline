@extends('templates.moldura_preg')
@section('content')

<link rel='stylesheet' type='text/css' media='screen' href='./css/preg/cadastro_usuario.css'>

<div class="solicitacao">

    <form method="POST" action="cadastrar_usuario">
        {{csrf_field() }}

    <div class="form-title-solicitacao">
        
            Cadastro de usuários

        <div class="select-combo-box">
            <select name='tipo' id=1 selected="selected" class="combo-box">
                <option class="option" value="preg">PREG</option>
                <option class="option" value="empr" >Empresa</option>
                <option class="option" value="prof">Professor</option>
            </select>
            
        </div>
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

            <div class="end-solicitacao"></div>
                
            <div class="form-fields-solicitacao"></div>
    
            <input class="form-submit" type="submit" value="Salvar">
            
        </div>
    </form>

</div>
        
@endsection
