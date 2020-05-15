@extends('templates.moldura')
@section('content')

<!-- Função de mascara dos campos -->
<head>
    <script type="text/javascript">
        function mask(src, mascara) {
            var campo = src.value.length;
            var saida = mascara.substring(0,1);
            var texto = mascara.substring(campo);
            if(texto.substring(0,1) != saida) {
                src.value += texto.substring(0,1);
            }
        }
    </script>
</head>


<link rel='stylesheet' type='text/css' media='screen' href='./css/cadastro_usuario.css'>

<div class="solicitacao">

    <div class="form-title-solicitacao">Cadastro para empresas</div>
    <div class="form-solicitacao">

        <form method="POST" action="cadastro_empresa">
            {{csrf_field() }}
            
            <div>
                <div class="left-side">Nome:</div> 
                <div class="right-side"><input maxlength="40" minlength="10" class="input-solicitacao" type="text" name="nome" autofocus required></div>
            </div>

            <div>
                <div class="left-side">E-mail:</div> 
                <div class="right-side"><input maxlength="30" minlength="10" class="input-solicitacao" type="text" name="email" autofocus required></div>
            </div>

            <div>
                <div class="left-side">Usuário:</div> 
                <div class="right-side"><input maxlength="15" minlength="5" class="input-solicitacao" type="text" name="usuario" autofocus required></div>
            </div>
            
            <div>
                <div class="left-side">Senha:</div> 
                <div class="right-side"><input maxlength="15" minlength="5" class="input-solicitacao" type="password" name="senha" required></div>
            </div>

            <div>
                <div class="left-side">Confirme a senha:</div> 
                <div class="right-side"><input maxlength="15" minlength="5" class="input-solicitacao" type="password" name="conf_senha" required></div>
            </div>

            <div>
            
                <a class="bt-login left-side" href="login">Já tenho uma conta</a>
                <input class="form-submit" type="submit" value="Salvar">
            </div>
            
        </form>
    </div>
                    

</div>
        
@endsection
