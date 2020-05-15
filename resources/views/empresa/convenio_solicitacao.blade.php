@extends('templates.moldura_empresa')
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

<link rel='stylesheet' type='text/css' media='screen' href='./css/empresa/convenio__solicitacao.css'>
    
<div class="solicitacao">

    <div class="form-title-solicitacao">Solicitação de Convênio</div>
    <div class="form-solicitacao">

        <div class="form-fields-solicitacao"></div>

        <form method="POST" action="enviar_solicitacao">
            {{csrf_field() }}
            
            <div>
                <div class="l-side">Nome do Representante:</div> 
                <div class="r-side"><input maxlength="40" minlength="1" class="input-solicitacao" type="text" name="representante" autofocus required></div>
            </div>
            
            <div>
                <div class="l-side">Razão Social:</div> 
                <div class="r-side"><input maxlength="40" minlength="1" class="input-solicitacao" type="text" name="rsocial" required></div>
            </div>
            
            <div>
                <div class="l-side">CNPJ:</div> 
                <div class="r-side"><input onkeypress="mask(this,'##.###.###/####-##')" maxlength="18" minlength="18" class="input-solicitacao" type="text" name="cnpj" required ></div>
            </div>

            <div>
                <div class="l-side">Ie:</div> 
                <div class="r-side"><input onkeypress="mask(this,'########-##')" maxlength="11" minlength="11" class="input-solicitacao" type="text" name="ie" required></div>
            </div>
            
            <div>
                <div class="l-side">Endereço:</div> 
                <div class="r-side"><input maxlength="40"  minlength="1" class="input-solicitacao" type="text" name="endereco" required></div>
            </div>
            
            <div>
                <div class="l-side">CEP:</div> 
                <div class="r-side"><input onkeypress="mask(this,'#####-###')" maxlength="9"  minlength="9" class="input-solicitacao" type="text" name="cep" required></div>
            </div> 

            <div>
                <div class="l-side">Contato:</div> 
                <div class="r-side"><input onkeypress="mask(this,'## #####-####')" maxlength="13"  minlength="13" class="input-solicitacao" type="text" name="contato" required ></div>
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
                                        <input id="{{ $area }}" type="checkbox" name="ckb[]" value="{{ $area }}">
                                        <label for="{{ $area }}">{{ $area }}</label>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            <script type="text/javascript"src="js/convenio_solicitacao.js"></script> 

            <div class="end-solicitacao"></div>
                
            <div class="form-fields-solicitacao"></div>
    
            <input class="form-submit" type="submit" value="Enviar">
            
        </form>
    </div>

</div>
        
@endsection
