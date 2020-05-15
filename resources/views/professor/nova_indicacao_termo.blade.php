@extends('templates.moldura_professor')
@section('content')

<link rel="stylesheet" href="css/professor/nova_indicacao_termo.css">

<div class="painel" >
    <div class="aba_header">
        <div class="aba" >Setor</div>
        <div class="aba" >Empresa</div>
        <div class="aba" >Aluno</div>
        <div class="aba" id="aba_active">Termo de estágio</div>
    </div>
    <div class="aba_content" id="active">
        <div class="aba_title">
            Leia o termo de estágio e confirme 
        </div>

        <div class="aba_options" id="active" align="center">
            Eu, <br>
            <b>{{ $info[3] }}</b> <br>
            indico <b>{{ $info[0] }}</b> de matricula {{$info[1]}} <br>
            para o estágio supervisionado na empresa {{ $_SESSION["empresaEstagio"] }} <br>
            na área de <b>{{ $_SESSION["areaEstagio"] }}</b>.
        </div>

        <div class="aba_button">
            <form action="confirma_termo" method="post">
            {{csrf_field() }}
                <input type="hidden" name="termo"
                value='Eu, {{ $info[3] }} indico {{ $info[0] }} de matricula {{$info[1]}} para o estágio supervisionado na empresa {{ $_SESSION["empresaEstagio"] }} na área de {{ $_SESSION["areaEstagio"] }}.'>
                <input class="form-submit" type="submit" value="Confirmar">                                        
            </form>
            <a href="nova_indicacao_alunos2"><button class="form-submit" type="submit">Voltar</button> </a>
        </div>

    </div>
    
</div>
<script src="js/nova_indicacao.js"></script>

@endsection
