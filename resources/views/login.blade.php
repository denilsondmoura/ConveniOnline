@extends('templates.moldura')
@section('content')

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


    <link rel='stylesheet' type='text/css' media='screen' href='./css/login.css'>

<div class="form">
    <div class="form-title">Efetue login</div>
    <form class="form-fields" method="POST" action="logar">
        {{csrf_field() }}

        <div class="user-field">
            <div class="left-side" >Usuário:</div> 
            <div  class="right-side"><input maxlength="15" minlength="5" type="text" name='usuario' autofocus required></div>
        </div>
        <div class="password-field">
            <div class="left-side">Senha:</div> 
            <div class="right-side"><input maxlength="15" minlength="5"  type="password" name="senha" required></div>
        </div>

        <div class="form-section"></div>
        <div class="form-buttons">
            <input class="login-submit" type="submit" value="Entrar">
            <a class="bt-cadastro" href="cadastro">Criar uma conta</a>
        </div>
    </form>
</div>

@endsection
